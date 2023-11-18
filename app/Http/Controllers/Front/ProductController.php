<?php

namespace App\Http\Controllers\Front;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\ProductsFilter;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Route;

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
                                ->whereIn('category_id', $categoryDetails['catIds'])                // whereIn - Compare category_id on product table vs id on category table
                                ->where('brand_id','>', 0)                                          // brand_id > 0 because may be user forgot to / not select brand during add/update products. So we filter here
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
                    $categoryProducts->orderBy('products.id', 'DESC');                                       // original query for orderBy('id', 'DESC')
                }
            }

            // Update Query For Product Colors Filter
            if (isset($request['color']) && !empty($request['color'])) {                            // we can use request->input('color') instead of $request['sort'], but must include ublic function listing(Request $request)
                $color = explode('~', $request['color']);                                           // https://myfixsys.net/project10/public/men?color=Black~Blue~Green
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
        $categoryDetails = Category::categoryDetails($productDetails['category']['url']);                  // To perform breadcrumb links

        // Get Group Code Product (Product Color)
        $groupProducts = array();

        if (!empty($productDetails['group_code'])) {
            $groupProducts = Product::select('id', 'product_color')->where('id', '!=', $id)
                                ->where(['group_code'=>$productDetails['group_code'] , 'status' => 1])
                                ->get()->toArray();
        }
        
        // Get Related Products (RELATED PRODUCTS PRODUCTS THAT YOU ALSO LIKE TO BUY)
        $relatedProducts = Product::with('brand', 'images')
                            ->where('category_id', $productDetails['category']['id'])
                            ->where('id', '!=', $id)
                            ->limit(4)
                            ->inRandomOrder()
                            ->get()
                            ->toArray();        
        //dd($relatedProducts);

        return view('front.products.detail', compact('productDetails', 'categoryDetails', 'groupProducts', 'relatedProducts'));
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
}
