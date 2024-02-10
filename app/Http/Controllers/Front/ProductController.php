<?php

namespace App\Http\Controllers\Front;

use App\Models\Cart;
use App\Models\Coupon;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\ProductsFilter;
use App\Models\ProductsAttribute;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    public function listing(Request $request)
    {
        $url = Route::getFacadeRoot()->current()->uri;

        // Check if the category exists or not. 
        // If not exists then we will return the user to 404 page

        $categoryCount = Category::where(['url' => $url, 'status' => 1])->count();
        
        if ($categoryCount > 0) {
            // echo "Category exists";
            
            // Now we will create categoryDetails function in Category model to get the category details and category id's. 
            // If user opens the parent category url then we will get category id of parent as well as sub categories.

            // Get Category Detail and categoryDetails($url) get from App\Models\Category;
            $categoryDetails = Category::categoryDetails($url);
            //dd($categoryDetails);
            
            // Get Category and their Sub Category Products
            $categoryProducts = Product::with(['brand', 'images'])
                                ->whereIn('category_id', $categoryDetails['catIds'])                      // whereIn - Compare category_id on product table vs id on category table
                                ->where('brand_id','>', 0)                                                // brand_id > 0 because may be user forgot to / not select brand during add/update products. So we filter here
                                ->where('products.status', 1);                       

            // Update Query For Products Sorting
            if (isset($request['sort']) && !empty($request['sort'])) {                                    // we can use request->input('sort') instead of $request['sort'], but must include ublic function listing(Request $request)
                if ($request['sort'] == "product_latest") {
                    $categoryProducts->orderBy('id', 'DESC');
                } else if ($request['sort'] == "best_selling") {
                    $categoryProducts->where('is_bestseller', 'Yes');
                } else if ($request['sort'] == "best_rating") {
                    $categoryProducts->orderBy('id', 'DESC');
                } else if ($request['sort'] == "lowest_price") {
                    $categoryProducts->orderBy('final_price', 'ASC');
                } else if ($request['sort'] == "highest_price") {
                    $categoryProducts->orderBy('final_price', 'DESC');
                } else if ($request['sort'] == "featured_items") {
                    $categoryProducts->where('is_featured', 'Yes');
                } else if ($request['sort'] == "discounted_items") {
                    $categoryProducts->where('product_discount', '>', 0);
                } else {
                    $categoryProducts->orderBy('products.id', 'DESC');                                     // original query for orderBy('id', 'DESC')
                }
            }

            // Update Query For Product Colors Filter
            if (isset($request['color']) && !empty($request['color'])) {                                   // we can use request->input('color') instead of $request['sort'], but must include ublic function listing(Request $request)
                $color = explode('~', $request['color']);                                                  // https://myfixsys.net/project10/public/men?color=Black~Blue~Green
                $categoryProducts->whereIn('products.family_color', $color);
            }

            // Update Query For Product Sizes Filter
            if (isset($request['size']) && !empty($request['size'])) {                            
                $sizes = explode('~', $request['size']);                                           
                $categoryProducts->join('products_attributes','products_attributes.product_id','=','products.id')
                                ->whereIn('products_attributes.size', $sizes)
                                ->groupBy('products_attributes.product_id');
            }

            // Update Query For Product Brands Filter
            if (isset($request['brand']) && !empty($request['brand'])) {                            
                $brands = explode('~', $request['brand']);                                           
                $categoryProducts->whereIn('products.brand_id', $brands);
            }

            // Update Query For Product Prices Filter
            if (isset($request['price']) && !empty($request['price'])) {   
                $request['price'] = str_replace("~", "-", $request['price']);                               // convert ~ to - as https://myfixsys.net/project10/public/tshirts?price=101-200~201-300 
                $prices = explode('-', $request['price']);
                $count = count($prices);                                       
                $categoryProducts->whereBetween('products.final_price', [$prices[0],$prices[$count-1]]);    // $count will start from 0, so we must minus 1    
            }

            // Update Query For Product Dynamic Filter
            $filterTypes = ProductsFilter::filterTypes();
            foreach ($filterTypes as $key => $filter) {
                if ($request->$filter) {
                    $explodeFilterVals = explode('~', $request->$filter);
                    $categoryProducts->whereIn($filter, $explodeFilterVals);
                }                 
            }

            $categoryProducts = $categoryProducts->paginate(12);

            if ($request->ajax()) {
                return response()->json([
                    'view' => (String)View::make('front.products.ajax_products_listing', compact('categoryDetails', 'categoryProducts', 'url'))
                ]);
            } else {
                return view('front.products.listing', compact('categoryDetails', 'categoryProducts', 'url'));                
            }

        } else {
            
            abort(404);

        }                
    }

    public function detail($id)
    {
        $productCount = Product::where('id', $id)->where('status', 1)->count();                            
        
        if ($productCount == 0) {                                                                         // If product status = 0, then route will be 404
            abort('404');
        }

        $productDetails = Product::with(['category','brand','images',
                            'attributes'=>function($query) {                                              // do not display sizes if stock = 0 and status=0
                                $query->where('stock', '>', 0)->where('status', 1);
                            }])
                            ->find($id)
                            ->toArray();

        // Get Category Detail and categoryDetails($url) get from App\Models\Category;
        $categoryDetails = Category::categoryDetails($productDetails['category']['url']);                 // To perform breadcrumb links

        // Get Group Code Product (Product Color)
        $groupProducts = array();

        if (!empty($productDetails['group_code'])) {
            $groupProducts = Product::select('id', 'product_color')->where('id', '!=', $id)
                                ->where(['group_code'=>$productDetails['group_code'] , 'status' => 1])
                                ->get()->toArray();
        }
        
        // RELATED PRODUCTS - PRODUCTS THAT YOU ALSO LIKE TO BUY        
        // Get Related Products 
        $relatedProducts = Product::with('brand', 'images')
                            ->where('category_id', $productDetails['category']['id'])
                            ->where('id', '!=', $id)
                            ->limit(4)
                            ->inRandomOrder()
                            ->get()
                            ->toArray();        
        
        // CUSTOMERS WHO VIEWED THIS ITEM ALSO VIEWED
        // Set Session for Recentyly Viewed Items 
        if (empty(Session::get('session_id'))) {
            $session_id = md5(uniqid(rand(),true));                                                       // Get new session id
        }else {
            $session_id = Session::get('session_id');                                                     // Get session id previously
        }

        Session::put('session_id', $session_id);                                                          // Temporary save
        
        // Insert product in recently_viewed_items table if not already exists
        $countRecentlyViewedTtems = DB::table('recently_viewed_items')                                    // Count recently_viewed_items existed or not
                                    ->where(['product_id' => $id, 'session_id' => $session_id])
                                    ->count();
    
        if ($countRecentlyViewedTtems == 0) {                                                             // if recently_viewed_items equal 0, then insert the new product_id and session_id
            DB::table('recently_viewed_items')
            ->insert(['product_id' => $id, 'session_id' => $session_id]);
        }

        // Get Recently Viewed Product Ids
        $recentProductIds = DB::table('recently_viewed_items')                                            // Product Ids on recently_viewed_items table
                            ->select('product_id')
                            ->where('product_id', '!=', $id)
                            ->where('session_id', $session_id)
                            ->inRandomOrder()->get()
                            ->take(4)->pluck('product_id');
        
        // Get Recently Viewed Product
        $recentlyViewedProducts = Product::with('brand', 'images')
                                    ->whereIn('id', $recentProductIds)                                    // to match id with $recentProductIds
                                    ->get()
                                    ->toArray();  
    
        return view('front.products.detail', compact('productDetails', 'categoryDetails', 'groupProducts', 'relatedProducts', 'recentlyViewedProducts'));
    }
    
    public function getAttributePrice(Request $request)
    {
        if ($request->ajax()) {
            $data = $request->all();
            //echo "<pre>"; print_r($data); die;

            $getAttributePrice = Product::getAttributePrice($data['product_id'], $data['size']);
            // echo "<pre>"; print_r($getAttributePrice); die;

            return $getAttributePrice;
        }
    }

    public function addToCart(Request $request)
    {
        if ($request->isMethod('post')) {                                                                 // To check what is returning we are post method 
            $data = $request->all();
            // echo "<pre>"; print_r($data); die;                                                         // Array ([product_id] => 15,[size] => Small,[qty] => 2)

            // Check Product Stock
            $productStock = ProductsAttribute::productStock($data['product_id'],$data['size']);
            if ($data['qty'] > $productStock) {
                $message = "Required Quantity is not available!";
                return response()->json(['status'=>false, 'message'=>$message]);
            }

            // Check Product Status
            $productStatus = Product::productStatus($data['product_id']);
            if ($productStatus == 0) {
                $message = "Product is not available!";
                return response()->json(['status'=>false, 'message'=>$message]);
            }

            // To check whether that product already exists in cart table or not but first we must
            // Generate Session ID if not exists  
            //$session_id = Session::get('session_id');
            if (empty(Session::get('session_id'))) {
                $session_id = Session::getId();
                Session::put('session_id', $session_id);
            }else{
                $session_id = Session::get('session_id');
            }            
            
            // Check Product if already exists in the User Cart
            if (Auth::check()) {
                // User is logged in, we take user_id
                $user_id = Auth::user()->id;
                $countProducts = Cart::where(['product_id' => $data['product_id'], 
                                    'product_size' => $data['size'], 
                                    'user_id' => $user_id])
                                    ->count();               
            }else{
                //User is not logged in, we take a session
                $user_id = 0;
                $countProducts = Cart::where(['product_id' => $data['product_id'], 
                                    'product_size' => $data['size'], 
                                    'session_id' => $session_id])
                                    ->count();
            }

            if ($countProducts > 0) {
                $message = "Product already exists in Cart!";
                return response()->json(['status'=>false, 'message'=>$message]);
            }

            // Save the Product in Carts table
            $item = new Cart;
            $item->session_id = $session_id;

            if (Auth::check()) {                                                                          // if user logged in
                $item->user_id = Auth::user()->id;               
            }

            $item->product_id = $data['product_id'];
            $item->product_size = $data['size'];
            $item->product_qty = $data['qty'];            
            $item->save();

            // Get Total Cart Items
            $totalCartItems = totalCartItems();                                                           // $totalCartItems() come from \app\Helpers\helper.php

            $getCartItems = getCartItems();                                                               // getCartItems() come from \app\Helpers\helper.php

            $message = "Product added successfully in Cart! <a href='../cart' style='color:#ffffff; text-decoration:underline'>View Cart</a>";
            return response()->json([
                'status'=>true, 'message'=>$message, 
                'totalCartItems'=>$totalCartItems, 
                'getCartItems'=>$getCartItems,
                'minicartview' => (String)View::make('front.layout.header_cart_items')->with(compact('getCartItems')),
            ]);
        }
    }
    
    public function cart(Request $request)
    {
        //$getCartItems = Cart::getCartItems();                                                           // First tutorial
        $getCartItems = getCartItems();                                                                   // getCartItems() come from \app\Helpers\helper.php
        return view('front.products.cart', compact('getCartItems'));
    }

    public function updateCartItemQty(Request $request)
    {
        if ($request->ajax()) {
            $data = $request->all();
            //echo "<pre>"; print_r($data); die;

            // Get Cart Details
            $cartDetails = Cart::find($data['cartid']);

            // Get Available Product Stock
            $availableStock = ProductsAttribute::select('stock')
                                ->where(['product_id'=>$cartDetails['product_id'],'size'=>$cartDetails['product_size']])
                                ->first()->toArray();
            // echo "<pre>"; print_r($availableStock); die;

            // Check if desired Stock form user is available
            if ($data['qty'] > $availableStock['stock']) {
                //$getCartItems = Cart::getCartItems();                                                   // Please refer getCartItems form Cart Model
                $getCartItems = getCartItems();                                                           // getCartItems() come from \app\Helpers\helper.php
                return response()->json([
                    'status' => false, 
                    'message'=> "Product Stock is not available!",
                    'view' => (String)View::make('front.products.cart_items')->with(compact('getCartItems')),
                    'minicartview' => (String)View::make('front.layout.header_cart_items')->with(compact('getCartItems'))
                ]);
            } 
            
            // Check if product Size is available
            $availableSize = ProductsAttribute::where(['product_id'=>$cartDetails['product_id'],'size'=>$cartDetails['product_size'], 'status'=>1])->count();
            if ($availableSize == 0) {
                //$getCartItems = Cart::getCartItems();                                                   // Please refer getCartItems form Cart Model
                $getCartItems = getCartItems();                                                           // getCartItems() come from \app\Helpers\helper.php
                return response()->json([
                    'status' => false, 
                    'message'=> "Product Size is not available. Please remove and choose another one!",
                    'view' => (String)View::make('front.products.cart_items')->with(compact('getCartItems')),
                    'minicartview' => (String)View::make('front.layout.header_cart_items')->with(compact('getCartItems'))
                ]);
            }

            // Update the Cart Item Qty
            Cart::where('id', $data['cartid'])->update(['product_qty' => $data['qty']]);

            // Get Updated Cart Items
            //$getCartItems = Cart::getCartItems();                                                        // Please refer getCartItems form Cart Model
            $getCartItems = getCartItems();                                                                // getCartItems() come from \app\Helpers\helper.php

            // Get Total Cart Items
            $totalCartItems = totalCartItems();                                                            // $totalCartItems() come from \app\Helpers\helper.php

            // Return the Updated Cart Item via Ajax
            return response()->json([
                'status' => true, 
                'totalCartItems' => $totalCartItems,
                'view' => (String)View::make('front.products.cart_items')->with(compact('getCartItems')),
                'minicartview' => (String)View::make('front.layout.header_cart_items')->with(compact('getCartItems'))
            ]);
        }
    }

    public function deleteCartItem(Request $request)                                                       // First Option
    {
        if ($request->ajax()) {
            $data = $request->all();
            
            // Delete Cart
            Cart::where('id', $data['cartid'])->delete();

            // Get Updated Cart Items
            //$getCartItems = Cart::getCartItems();                                                        // Please refer getCartItems form Cart Model
            $getCartItems = getCartItems();                                                                // getCartItems() come from \app\Helpers\helper.php

            // Get Total Cart Items
            $totalCartItems = totalCartItems();                                                            // totalCartItems() come from \app\Helpers\helper.php

            // Return the Updated Cart Item via Ajax
            return response()->json([
                'status' => true, 
                'totalCartItems' => $totalCartItems,
                'view' => (String)View::make('front.products.cart_items')->with(compact('getCartItems')),
                'minicartview' => (String)View::make('front.layout.header_cart_items')->with(compact('getCartItems'))
            ]);
        }
    }

    public function emptyCart(Request $request)
    {
        if ($request->ajax()) {
            
            // Empty Cart
            emptyCart();                                                                                   // emptyCart() come from \app\Helpers\helper.php

            // Get Updated Cart Items
            //$getCartItems = Cart::getCartItems();                                                        // Please refer getCartItems form Cart Model
            $getCartItems = getCartItems();                                                                // getCartItems() come from \app\Helpers\helper.php

            // Get Total Cart Items
            $totalCartItems = totalCartItems();                                                            // totalCartItems() come from \app\Helpers\helper.php

            // Return the Updated Cart Item via Ajax
            return response()->json([
                'status' => true, 
                'totalCartItems' => $totalCartItems,
                'view' => (String)View::make('front.products.cart_items')->with(compact('getCartItems')),
                'minicartview' => (String)View::make('front.layout.header_cart_items')->with(compact('getCartItems'))
            ]);
        }
    }

    public function deleteCartItemSecondOption(Request $request)                                           // Second Option
    {
        if ($request->ajax()) {
            $data = $request->all();

            if (Auth::check()) {               
                
                // User is logged in, we take user_id
                $user_id = Auth::user()->id;
                $deleteCartItem = Cart::where(['id' => $data['cartid'], 'user_id' => $user_id])->delete();                

            }else{
                
                //User is not logged in, we take a session
                $user_id = 0;
                $deleteCartItem = Cart::where('id', $data['cartid'])->delete();

            }

            // Get Updated Cart Items
            //$getCartItems = Cart::getCartItems();                                                      // Please refer getCartItems form Cart Model
            $getCartItems = getCartItems();                                                              // getCartItems() come from \app\Helpers\helper.php

            // Get Total Cart Items
            $totalCartItems = totalCartItems();                                                          //totalCartItems() come from \app\Helpers\helper.php

            // Return the Updated Cart Item via Ajax
            return response()->json([
                'status' => true, 
                'totalCartItems' => $totalCartItems,
                'view' => (String)View::make('front.products.cart_items')->with(compact('getCartItems')),
                'minicartview' => (String)View::make('front.layout.header_cart_items')->with(compact('getCartItems'))
            ]);
        }
    }

    public function applyCoupon(Request $request)
    {
        if ($request->ajax()) {
            $data = $request->all();
            //echo '<pre>'; print_r($data); die;
            
            // Get Updated Cart Item
            $getCartItems = getCartItems();                                                               // getCartItems() come from \app\Helpers\helper.php

            // Get Total Cart Items
            $totalCartItems = totalCartItems();                                                           // $totalCartItems() come from \app\Helpers\helper.php

            // Verify Coupon whether is valid/not
            $couponCount = Coupon::where('coupon_code', $data['code'])->where('status', 1)->count();
            if ($couponCount == 0) {
                return response()->json([
                    'status' => false,
                    'totalCartItems' => $totalCartItems,
                    'message'=>'The coupon is not valid',
                    'view' => (String)View::make('front.products.cart_items')->with(compact('getCartItems')),
                    'minicartview' => (String)View::make('front.layout.header_cart_items')->with(compact('getCartItems'))
                ]);
            } else {
                # check for other coupon conditions
                echo "Coupon valid";    die;
            }
            

        }
    }
}