<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\Category;
use App\Models\AdminsRole;
use Illuminate\Http\Request;
use App\Models\ProductsImage;
use App\Models\ProductsAttribute;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Session;

class ProductsController extends Controller
{
    //use doc_fun snippet to call public function name()    
    public function products()
    {
        Session::put('page', 'products');                             //Session::put setara dgn $request->session()->put('page', 'prodducts');    
        
        //When we use "with('category')", make sure on Product Model has a relation (BelongTo, HasMany or etc).
        //Other way is joint table of Products and Categories
        
        //$products = Product::with('category')->get()->toArray();    // utk lihat susunan array yg cantik
        //dd($products);
        
        $products = Product::with('category')->get();

        //Set Admin/Subadmins Permission for Product
        $productsModuleCount = AdminsRole::where(['subadmin_id'=>Auth::guard('admin')->user()->id, 'module'=>'products'])->count();       
        $productsModule= [];
        
        //Check if admin, so give a full access
        if (Auth::guard('admin')->user()->type == 'admin') {
            $productsModule['view_access'] = 1;
            $productsModule['edit_access'] = 1;
            $productsModule['full_access'] = 1;
        } else if($productsModuleCount == 0) {                   //if subadmin not set anything permission, give it message
            $message = "This feature is restricted for you!"; 
            return redirect('admin/dashboard')->with('error_message', $message);
        }else{                                                  //check if subadmin is set permission
            $productsModule = AdminsRole::where(['subadmin_id'=>Auth::guard('admin')->user()->id, 'module'=>'products'])->first();
        }

        return view('admin.products.products', compact('products', 'productsModule'));
    }

    public function updateProductStatus(Request $request)              
    {         
        if ($request->ajax()) {
            $data = $request->all();
            //dd($data);
            //echo "<pre>"; print_r($data); die;

            if ($data['status']=="Active") {
                $status = 0;    // Initial value is 1 (active) that set direct to database b4 and displayed as an active.  after user click to inactive, this toggle button will change to 0 value
            } else {
                $status = 1;    
            }
            
            Product::where('id', $data['product_id'])->update(['status' => $status,]);

            return response()->json(['status'=>$status, 'product_id'=>$data['product_id']]);
        }         
    }

    public function addEditProduct(Request $request, $id=null)
    {      
        Session::put('page', 'products');                             //Session::put setara dgn $request->session()->put('page', 'prodducts');        

        if ($id == "") {
            # Add product
            $title   = "Add Product";
            $product = new Product;
            $message = "Product added successfully!";
        } else {
            # Edit product
            $title   = "Edit Product";
            $product =  Product::with(['images','attributes'])->find($id);         //When we use "with(['images','attributes'])", make sure on Product Model has a relation (BelongTo, HasMany or etc). Other way is joint the products table and products_images/attributes table 
            //dd($product);       
            $message = "Product updated successfully!";
        }

        if ($request->isMethod('post')) {
            $data = $request->all();
            //dd($data);
            
            //Product validation
            if ($id == "") {
                $rules = [
                    'categoryID' => 'required',
                    'prodname'    => 'required|regex:/^[\pL\s\-]+$/u|max:200',
                    'prodcode'    => 'required|regex:/^[\w-]*$/|max:30',
                    'prodcolor'   => 'required|regex:/^[\pL\s\-]+$/u|max:200',
                    'familycolor' => 'required|regex:/^[\pL\s\-]+$/u|max:200',
                    'prodprice'   => 'required|numeric',
                ];
            } else {
                $rules = [
                    'categoryID' => 'required',
                    'prodname'    => 'required|regex:/^[\pL\s\-]+$/u|max:200',
                    'prodcode'    => 'required|regex:/^[\w-]*$/|max:30',
                    'prodcolor'   => 'required|regex:/^[\pL\s\-]+$/u|max:200',
                    'familycolor' => 'required|regex:/^[\pL\s\-]+$/u|max:200',
                    'prodprice'   => 'required|numeric',
                ];
            }

            $customMessages = [
                'categoryID.required'   => 'Category is required',

                'prodname.required'     => 'Product Name is required',
                'prodname.regex'        => 'Valid Product Name is required',
                
                'prodcode.required'     => 'Product Code is required',
                'prodcode.regex'        => 'Valid Product Code is required',
                
                'prodcolor.required'    => 'Product Color is required',
                'prodcolor.regex'       => 'Valid Product Color is required',

                'familycolor.required'  => 'Family Color is required',
                'familycolor.regex'     => 'Valid Family Color is required',

                'prodprice.required'    => 'Product Price is required',
                'prodprice.numeric'     => 'Valid Product Price is required',
            ];

            $this->validate($request, $rules, $customMessages);

            // Upload product video
            if ($request->hasFile('prodvideo')) {
                $video_tmp = $request->file('prodvideo');

                //Checking is it video valid / invalid extension format (.mkv/.mp4/.flv or etc)
                if ($video_tmp->isValid()) {
                    //Upload video
                    // $video_name = $video_tmp->getClientOriginalName();
                    $video_extension = $video_tmp->getClientOriginalExtension();

                    //Give a random name for video to avoid overwrite file
                    $videoName = rand().'.'. $video_extension;
                    $videoPath = "front/videos/products/";
                    $video_tmp->move($videoPath, $videoName);

                    //Save Video Name into products table
                    $product->product_video = $videoName;
                }
            }         
            
            if (!empty($data['isfeatured'])) {
                $product->is_featured = $data['isfeatured'];                
            } else {
                $product->is_featured = "No";
            }

            // Add or update data
            $product->category_id       = $data['categoryID'];
            $product->product_name      = $data['prodname'];
            $product->product_code      = $data['prodcode'];
            $product->product_color     = $data['prodcolor'];
            $product->family_color      = $data['familycolor'];
            $product->group_code        = $data['groupcode'];
            $product->product_price     = $data['prodprice'];
            $product->product_discount  = $data['proddiscount'];        //If the data HAS a value, then "discount type = product". If there is NO data, then "discount type = category"

            //Calculate discount and must check if it has a discount/not for Product and Category
            if (!empty($data['proddiscount']) && $data['proddiscount'] > 0) {
                // Product Discount
                $product->discount_type = 'product';
                $product->final_price = $data['prodprice'] - ($data['prodprice'] * $data['proddiscount'])/100;
            } else {
                //Category Discount
                $getCategoryDiscount = Category::select('category_discount')->where('id', $data['categoryID'])->first();

                if ($getCategoryDiscount->category_discount == 0) {             
                    //No discount because category discount is 0            
                    $product->discount_type = "";
                    $product->final_price = $data['prodprice'];
                } else {
                    $product->discount_type = 'category';
                    $product->final_price = $data['prodprice'] - ($data['prodprice'] * $getCategoryDiscount->category_discount)/100;
                }
            }

            $product->product_weight    = $data['prodweight'];
            $product->description       = $data['descr'];
            $product->wash_care         = $data['washcare'];
            $product->fabric            = $data['fabric'];
            $product->pattern           = $data['pattern'];
            $product->sleeve            = $data['sleeve'];
            $product->fit               = $data['fit'];
            $product->occasion          = $data['occasion'];
            $product->search_keywords   = $data['searchkeywords'];
            $product->meta_title        = $data['metatitle'];
            $product->meta_description  = $data['metadesc'];
            $product->meta_keywords     = $data['metakeys'];
            $product->status            = 1;
            $product->save();

            $newID = $product->id; 

            //Save Product Images
            if ($id == "") {
                # Add product images
                //$productID = $newID;                         // Option 1. The id must be obtained after newly product saved
                $productID = DB::getPdo()->lastInsertId();     // Option 2. The id must be obtained after newly product saved
            } else {
                # Edit product images
                $productID = $id;
            }

            //Upload Product Images
            if ($request->hasFile('prodimages')) {
                $images = $request->file('prodimages');

                // Must loop because user input multiple images more than 1 image
                foreach ($images as $key => $img) {
                    //Generate Temp Image Resource From File
                    $image_tmp = Image::make($img);

                    //Get Image Extension
                    $extension = $img->getClientOriginalExtension();
                    
                    //Generate New Image Name
                    $imageName = 'product-'.rand(1, 9999999).'.'.$extension;
                    
                    //Image Path for Small, Medium and Large Images Size
                    $smallImagePath  = 'front/images/products/small/'.$imageName;
                    $mediumImagePath = 'front/images/products/medium/'.$imageName;
                    $largeImagePath  = 'front/images/products/large/'.$imageName;

                    //Upload the Small, Medium and Large Images After Resizes
                    Image::make($image_tmp)->resize(260,300)->save($smallImagePath);
                    Image::make($image_tmp)->resize(520,600)->save($mediumImagePath);
                    Image::make($image_tmp)->resize(1040,1200)->save($largeImagePath);

                    //Insert Image data into products_images table
                    $image = new ProductsImage;
                    $image->product_id  = $productID;
                    $image->image       = $imageName;
                    $image->status      = 1;
                    $image->save();
                }
            }

            //Sort Product Image On Edit Mode            
            if ($id != "") {                        // id not equal 0 means, the id must has figure and normally it is in edit mode                 
                if (isset($data['img'])) {          //Check whether any sorting incoming / not $data['img'] that whether it is incoming / not
                    foreach ($data['img'] as $key => $image) {
                        ProductsImage::where(['product_id'=>$id, 'image'=>$image])->update([
                            'image_sort'=>$data['imgsort'][$key]     //$key is really necessary and based on name="imgsort[]" ---> bracket [] is refer to key
                        ]);
                    }
                }
            } 

            //Add Product Attributes
            //Loop product attributes that user inserted
            foreach ($data['sku'] as $key => $value) {
                
                $test = [$data['price'][$key], $data['stock'][$key]];  
                //dd($test);
                
                //check if SKU and Size exist / not. If exist, so display error message

                if (!empty($data['sku'])) {

                    # Check if SKU existed or not. If existed, display eroor message
                    $countSKU = ProductsAttribute::where('sku',$value)->count();
                    if($countSKU > 0) {
                        $message = "SKU already existed! Please add another SKU";
                        return redirect()->back()->with('error_message', $message);
                    }

                    # Check if Size existed or not. If existed, display eroor message
                    $countSize = ProductsAttribute::where(['product_id'=>$productID, 'size'=>$data['size'][$key]])->count();
                    if ($countSize > 0) {
                        $message = "Size already existed! Please add another Size";
                        return redirect()->back()->with('error_message', $message);
                    }

                    //Save all if SKU and Size are different
                    $saveAttribute = new ProductsAttribute;
                    if (!empty($data['size'][$key] && $data['price'][$key] && $data['stock'][$key] && $value)) {
                        $saveAttribute->product_id  = $productID;
                        $saveAttribute->sku         = $value;
                        $saveAttribute->size        = $data['size'][$key];     //$key based on name="size[]" ---> bracket [] is refer to key
                        $saveAttribute->price       = $data['price'][$key];
                        $saveAttribute->stock       = $data['stock'][$key];
                        $saveAttribute->status      = 1;    
                        $saveAttribute->save();                        
                    }                    
                }                 
            }

            //Edit Product Attributes
            //Loop product attributes that user inserted
            foreach ($data['attributeID'] as $akey => $attribute) {
                if (!empty($attribute)) {
                    ProductsAttribute::where(['id'=>$data['attributeID'][$akey]])->update([           //$key based on name="attributeID[]" ---> bracket [] is refer to key
                        'price'=>$data['attr_price'][$akey],
                        'stock'=>$data['attr_stock'][$akey] 
                    ]);
                }
            }

            return redirect('admin/products')->with('success_message', $message);              
        }

        //Get Categories and their Sub Categories
        //Recall the getCategories() function from the Category Model and
        //After that you can create a dropdown menu in the blade
        $getCategories = Category::getCategories();         
        
        //Product filter that perform on product model
        $productsFilters = Product::productsFilters();
        
        return view('admin.products.add_edit_product', compact('title', 'product', 'getCategories', 'productsFilters'));
    }  
    
    public function updateAttributeStatus(Request $request)              
    {         
        if ($request->ajax()) {
            $data = $request->all();
            //dd($data);
            //echo "<pre>"; print_r($data); die;

            if ($data['status']=="Active") {
                $status = 0;    // Initial value is 1 (active) that set direct to database b4 and displayed as an active.  after user click to inactive, this toggle button will change to 0 value
            } else {
                $status = 1;    
            }
            
            ProductsAttribute::where('id', $data['attribute_id'])->update(['status' => $status]);

            return response()->json(['status'=>$status, 'attribute_id'=>$data['attribute_id']]);
        }         
    }

    public function deleteAttribute($id)
    {
        $deleteAttribute = ProductsAttribute::findOrFail($id)->delete();
        return redirect()->back()->with('success_message', 'Attribute deleted successfully!');   
    }
    
    public function deleteProductVideo($id)
    {
        //Get Product Video
        $productVideo = Product::select('product_video')->where('id', $id)->first();

        //Get Product Video Path
        $product_video_path = 'front/videos/products/';

        //Delete Product Video from product folder if exists
        if (file_exists($product_video_path.$productVideo->product_video)) {
            unlink($product_video_path.$productVideo->product_video);
        }

        //Delete Product Video Name from products table
        $deleteVideo = Product::where('id', $id)->update(['product_video'=>'']);

        return redirect()->back()->with('success_message', 'Product video deleted successfully!'); 
    }

    public function deleteProductImage($id)
    {
        //Get Product Image
        $productImage = ProductsImage::select('image')->where('id', $id)->first();

        //Get Product Image Path
        $small_image_path   = 'front/images/products/small/';
        $medium_image_path  = 'front/images/products/medium/';
        $large_image_path   = 'front/images/products/large/';

        //Delete Product Image from folder if exists for: 

        //Small
        if (file_exists($small_image_path.$productImage->image)) {
            unlink($small_image_path.$productImage->image);
        }

        //Medium
        if (file_exists($medium_image_path.$productImage->image)) {
            unlink($medium_image_path.$productImage->image);
        }

        //Large
        if (file_exists($large_image_path.$productImage->image)) {
            unlink($large_image_path.$productImage->image);
        }

        //Delete Product Video Name from products table
        $deleteImage = ProductsImage::where('id', $id)->delete();

        return redirect()->back()->with('success_message', 'Product Image deleted successfully!'); 
    }

    public function deleteProduct($id)
    {
        $product = Product::findOrFail($id)->delete();
        return redirect()->back()->with('success_message', 'Product deleted successfully!');   
    }    
}
