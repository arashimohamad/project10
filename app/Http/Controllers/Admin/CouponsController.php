<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Brand;
use App\Models\Coupon;
use App\Models\Category;
use App\Models\AdminsRole;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CouponsController extends Controller
{
    public function coupons()
    {
        Session::put('page','coupons');                                                                                                     // Highlight the siderbar for coupon module
        $coupons = Coupon::get();                                                                                                           // Option 1 will call data on blade {{$page->title}}
        //$CmsPages = CmsPage::get()->toArray();                                                                                            // Option 2 will call data on blade {{$page['title']}}

        //Set Admin/Subadmins Permission for Coupon
        $couponsModuleCount = AdminsRole::where(['subadmin_id'=>Auth::guard('admin')->user()->id, 'module'=>'coupons'])->count();       
        $couponsModule= [];

        //Check if admin, so give a full access
        if (Auth::guard('admin')->user()->type == 'admin') {
            $couponsModule['view_access'] = 1;
            $couponsModule['edit_access'] = 1;
            $couponsModule['full_access'] = 1;
        } else if($couponsModuleCount == 0) {                                                                                               // if subadmin not set anything permission, give it message
            $message = "This feature is restricted for you!"; 
            return redirect('admin/dashboard')->with('error_message', $message);
        }else{                                                                                                                              // check if subadmin is set permission
            $couponsModule = AdminsRole::where(['subadmin_id'=>Auth::guard('admin')->user()->id, 'module'=>'coupons'])->first();
        }

        return view('admin.coupons.coupons', compact('coupons', 'couponsModule'));     
    }

    public function updateCouponStatus(Request $request)              
    {       
        if ($request->ajax()) {
            $data = $request->all();
            //dd($data);

            if ($data['status']=="Active") {
                $status = 0;                                // Initial value is 1 (active) that set direct to database b4 and displayed as an active.  after user click to inactive, this toggle button will change to 0 value
            } else {
                $status = 1;    
            }
            
            Coupon::where('id', $data['coupon_id'])->update([
                'status' => $status,
            ]);

            return response()->json(['status'=>$status, 'coupon_id'=>$data['coupon_id']]);
        }         
    }

    public function addEditCoupon(Request $request, $id=null)               // id = null sbb data tiada lagi
    {
        if ($id == "") {
            $coupon = new Coupon;                                           // add process
            $selCats = array();                                             // select Categories
            $selBrands = array();                                           // select Brands
            $selUsers = array();                                            // select Users
            $title = "Add Coupon";
            $message = "Coupon added successfully!";
        } else {
            $coupon = Coupon::find($id);                                    // edit process
            $selCats = explode(",", $coupon['categories']);          // explode Categories (separate data by commas), we'ii use in_array on blade to call data
            $selBrands = explode(",", $coupon['brands']);            // explode Brands (separate data by commas), we'ii use in_array on blade to call data
            $selUsers = explode(",", $coupon['users']);              // explode Users (separate data by commas), we'ii use in_array on blade to call data
            $title = "Edit Coupon";
            $message = "Coupon updated successfully";
        }

        if ($request->isMethod('post')) {
            $data = $request->all();
            //echo '<pre>'; print_r($data); die;

            // Coupon Validation
            if ($id == "") {
                $rules = [
                    'coupon_categories' => 'required',  
                    'coupon_brands'     => 'required',
                    'coupon_option'     => 'required',
                    'coupon_type'       => 'required',
                    'coupon_amounttype' => 'required',
                    'coupon_amount'     => 'required|numeric',
                    'coupon_expirydate' => 'required',
                    'coupon_code'       => 'unique:coupons',
                ];
            } else {
                $rules = [
                    'coupon_categories' => 'required',  
                    'coupon_brands'     => 'required',
                    'coupon_option'     => 'required',
                    'coupon_type'       => 'required',
                    'coupon_amounttype' => 'required',
                    'coupon_amount'     => 'required|numeric',
                    'coupon_expirydate' => 'required',
                ];
            }          

            $customMessages = [
                'coupon_categories.required' => 'Select Categories',
                'coupon_brands.required'     => 'Select Brands',
                'coupon_option.required'     => 'Select Coupon Option',
                'coupon_type.required'       => 'Select Coupon Type',
                'coupon_amounttype.required' => 'Select Coupon Amount Type',
                'coupon_amount.required'     => 'Enter Amount',
                'coupon_amount.numeric'      => 'Enter Valid Amount',
                'coupon_expirydate.required' => 'Enter Expiry Date',                
            ];

            $this->validate($request, $rules, $customMessages);

            // Convert Categories Array to String
            if (isset($data['coupon_categories'])) {
                $categories = implode(',', $data['coupon_categories']);
            } else {
                $categories = "";
            }

            // Convert Brands Array to String
            if (isset($data['coupon_brands'])) {
                $brands = implode(',', $data['coupon_brands']);
            } else {
                $brands = "";
            }

            // Convert Users Array to String
            if (isset($data['coupon_users'])) {
                $users = implode(',', $data['coupon_users']);
            } else {
                $users = "";
            }

            // Generate Coupon Code 
            if ($data['coupon_option'] == "Automatic") {
                $coupon_code = Str::random(8);
            } else {
                $coupon_code = $data['coupon_code'];
            }

            $coupon->coupon_option = $data['coupon_option'];
            $coupon->coupon_code = $coupon_code;
            $coupon->categories = $categories;
            $coupon->brands = $brands;
            $coupon->users = $users;
            $coupon->coupon_type = $data['coupon_type'];
            $coupon->amount_type = $data['coupon_amounttype'];
            $coupon->amount = $data['coupon_amount'];
            $coupon->expiry_date = $data['coupon_expirydate'];
            $coupon->status = 1;
            $coupon->save();

            return redirect('admin/coupons')->with('success_message', $message);
        }

        //Get Categories and their Sub Categories
        //Recall the getCategories() function from the Category Model and
        //After that you can create a dropdown menu in the blade
        $getCategories = Category::getCategories(); 
        
        //Get Brand
        $getBrands = Brand::where('status', 1)->orderBy('brand_name', 'ASC')->get();

        // Get User Emails
        $getUsers = User::select('email')->where('status', 1)->get();
        
        return view('admin.coupons.add_edit_coupon', compact('title','coupon','message', 'getCategories', 'getBrands', 'getUsers', 'selCats', 'selBrands','selUsers',));
    }

    public function deleteCoupon($id)
    {
        $coupon = Coupon::findOrFail($id)->delete();
        return redirect()->back()->with('success_message', 'Coupon deleted successfully!');   
    }
}
