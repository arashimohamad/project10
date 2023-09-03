<?php

namespace App\Http\Controllers\Admin;

use App\Models\Brand;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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

    public function FunctionName3(Request $request)
    {
        #Session::put('page', 'brands'); 
    }

    public function FunctionName4(Request $request)
    {
        #Session::put('page', 'brands'); 
    }

    public function FunctionName5(Request $request)
    {
        #Session::put('page', 'brands'); 
    }
}
