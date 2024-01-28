<?php

namespace App\Http\Controllers\Admin;

use App\Models\Coupon;
use App\Models\AdminsRole;
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
        //
    }

    public function deleteCoupon($id)
    {
        $coupon = Coupon::findOrFail($id)->delete();
        return redirect()->back()->with('success_message', 'Coupon deleted successfully!');   
    }
}
