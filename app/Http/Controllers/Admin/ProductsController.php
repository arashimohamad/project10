<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductsController extends Controller
{
    //use doc_fun snippet to call public function name()    
    public function products()
    {
        //When we use "with('category')", make sure on Product Model has a relation (BelongTo, HasMany or etc).
        //Other way is joint table of Products and Categories
        
        //$products = Product::with('category')->get()->toArray();        // utk lihat susunan array yg cantik
        //dd($products);
        
        $products = Product::with('category')->get();
        return view('admin.products.products', compact('products'));
    }

    public function updateProductStatus(Request $request)              
    {        
        //echo "AAAA"; die;
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
        //Add dan Edit buat kat sini        
        //Session::put('page', 'categories');                             //Session::put setara dgn $request->session()->put('page', 'categories');        

        if ($id == "") {
            # Add product
            $title   = "Add product";
            $product = new Product;
            $message = "Product added successfully!";
        } else {
            $title   = "Edit product";
            $product =  Product::find($id);
            $message = "Product updated successfully!";
        }

        if ($request->isMethod('post')) {
            $data = $request->all();

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

                    //give a random name for video to avoid overwrite file
                    $videoName = rand().'.'. $video_extension;
                    $videoPath= "front/videos";
                    $video_tmp->move($videoPath, $videoName);

                    //Save Video name in products table
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
            $product->product_discount  = $data['proddiscount'];
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

            return redirect('admin/products')->with('success_message', $message);  
            
        }

        //Get Categories and their Sub Categories
        $getCategories = Category::getCategories();                     //recall function getCategories() dari Model Category dan baru boleh buat dropdown menu di blade
        
        //Product filter that perform on product model
        $productsFilters = Product::productsFilters();
        
        return view('admin.products.add_edit_product', compact('title', 'product', 'getCategories', 'productsFilters'));
    }

    public function deleteProduct($id)
    {
        $product = Product::findOrFail($id)->delete();
        return redirect()->back()->with('success_message', 'Product deleted successfully!');   
    }
}
