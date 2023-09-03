<?php

namespace App\Http\Controllers\Admin;

use App\Models\Brand;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Session;

class BrandController extends Controller
{    
    public function brands()
    {
        Session::put('page', 'brands');                      //Session::put setara dgn $request->session()->put('page', 'prodducts');
        $brands = Brand::get();
        return view('admin.brands.brands', compact('brands'));        
    }

    public function updateBrandStatus(Request $request)              
    {       
        if ($request->ajax()) {
            $data = $request->all();
            //dd($data);

            if ($data['status']=="Active") {
                $status = 0;                                // Initial value is 1 (active) that set direct to database b4 and displayed as an active.  after user click to inactive, this toggle button will change to 0 value
            } else {
                $status = 1;    
            }
            
            Brand::where('id', $data['brand_id'])->update([
                'status' => $status,
            ]);

            return response()->json(['status'=>$status, 'brand_id'=>$data['brand_id']]);
        }         
    }

    public function deleteBrand($id)
    {
        $brand = Brand::findOrFail($id)->delete();
        return redirect()->back()->with('success_message', 'Brand deleted successfully!');   
    }

    public function addEditBrand(Request $request, $id=null)         // id = null sbb data tiada lagi
    {
        //Add dan Edit buat kat sini        
        Session::put('page', 'brands');     

        if ($id == "") {
            $title = 'Add Brand';
            $brand = new Brand;
            $message = 'Brand added successfully!';
        } else {
            $title = 'Edit Brand';
            $brand = Brand::find($id);
            $message = 'Brand updated successfully!';
        }

        if ($request->isMethod('post')) {
            $data = $request->all();

            //Brand Validation
            if ($id == "") {
                $rules = [
                    'bdname' => 'required',                
                    'url'    => 'required|unique:brands',           //unique:categories merujuk kpd data url dalam table categories
                ];
            } else {
                $rules = [
                    'bdname' => 'required',
                    'url'    => 'required',
                ];
            }            

            $customMessages = [
                'bdname.required' =>  'Brand Name is required',
                'url.required'    =>  'Brand URL is required',
                'url.unique'      =>  'Unique Brand URL is required',
                'url.required'    =>  'URL is required',
            ];

            $this->validate($request, $rules, $customMessages);           

            //Upload Brand Image
            if ($request->hasfile('bdimage')) {
                $image_tmp = $request->file('bdimage');
                if ($image_tmp->isValid()) {
                    // Get image extension
                    $extension = $image_tmp->getClientOriginalExtension();

                    //Generate New Image Name
                    $imageName = rand(111,99999).'.'.$extension;        //123.jpg
                    $image_path = 'front/images/brands/'.$imageName;        

                    //Upload the Brand Image   
                    Image::make($image_tmp)->save($image_path);         //save image path on table admins
                    $brand->brand_image = $imageName;
                }            
            }else if(!empty($data['hidden_image'])){
                $brand->brand_image = $data['hidden_image'];
            }else{
                $brand->brand_image = "";
            }

            //Upload Brand Logo
            if ($request->hasfile('bdlogo')) {
                $logo_tmp = $request->file('bdlogo');
                if ($logo_tmp->isValid()) {
                    // Get image extension
                    $extension = $logo_tmp->getClientOriginalExtension();

                    //Generate New Logo Name
                    $logoName = rand(111,99999).'.'.$extension;        //123.jpg
                    $logo_path = 'front/images/brands/'.$logoName;        

                    //Upload the Brand Image   
                    Image::make($logo_tmp)->save($logo_path);         //save logo path on table admins
                    $brand->brand_logo = $logoName;
                }            
            }else if(!empty($data['hidden_logo'])){
                $brand->brand_logo = $data['hidden_logo'];
            }else{
                $brand->brand_logo = "";
            }

            // Remove Brand Discount from all products belong to specific Brand
            if (empty($data['bddiscount'])) {
                $data['bddiscount'] = 0;                               //fasilitator ubah dlm table brand dgn nilai 0 sbg default value.
                if ($id != "") {
                    $brandProducts = Product::where('brand_id', $id)->get()->toArray();
                    foreach ($brandProducts as $key => $product) {
                        if ($product['discount_type'] == "brand") {
                            Product::where('id', $product['id'])->update([
                                'discount_type' => '',
                                'final_price' => $product['product_price']
                            ]);
                        }
                    }
                }
            }
            
            // add or edit process
            $brand->brand_name        = $data['bdname'];            
            $brand->brand_discount    = $data['bddiscount'];             
            $brand->description       = $data['description'];
            $brand->url               = $data['url']; 
            $brand->meta_title        = $data['metatitle'];
            $brand->meta_description  = $data['metadesc'];
            $brand->meta_keywords     = $data['metakey'];
            $brand->status            = 1;                            // Default = 1
            $brand->save();

            return redirect('admin/brands')->with('success_message', $message);            
        }

        return view('admin.brands.add_edit_brand', compact('title', 'brand'));
        
    }

    public function FunctionName4(Request $request)
    {
        #Session::put('page', 'brands'); 
    }

    public function FunctionName5(Request $request)
    {
        #Session::put('page', 'brands'); 
    }

    public function FunctionName6(Request $request)
    {
        #Session::put('page', 'brands'); 
    }

    public function FunctionName7(Request $request)
    {
        #Session::put('page', 'brands'); 
    }

    public function FunctionName8(Request $request)
    {
        #Session::put('page', 'brands'); 
    }
}
