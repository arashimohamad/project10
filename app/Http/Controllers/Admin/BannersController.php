<?php

namespace App\Http\Controllers\Admin;

use App\Models\Banner;
use App\Models\AdminsRole;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class BannersController extends Controller
{    
    public function banners()
    {
        // Session::put('page', 'banners');                                    //Session::put setara dgn $request->session()->put('page', 'banners');
        $banners = Banner::get();

        //Set Admin/Subadmins Permission for Banner
        $bannersModuleCount = AdminsRole::where(['subadmin_id'=>Auth::guard('admin')->user()->id, 'module'=>'banners'])->count();       
        $bannersModule= [];
        
        //Check if admin, so give a full access
        if (Auth::guard('admin')->user()->type == 'admin') {
            $bannersModule['view_access'] = 1;
            $bannersModule['edit_access'] = 1;
            $bannersModule['full_access'] = 1;
        } else if($bannersModuleCount == 0) {                     //if subadmin not set anything permission, give it message
            $message = "This feature is restricted for you!"; 
            return redirect('admin/dashboard')->with('error_message', $message);
        }else{                                                  //check if subadmin is set permission
            $bannersModule = AdminsRole::where(['subadmin_id'=>Auth::guard('admin')->user()->id, 'module'=>'banners'])->first();
        }

        return view('admin.banners.banners', compact('banners', 'bannersModule'));

    }

    public function updateBannerStatus(Request $request)
    {
        if ($request->ajax()) {
            $data = $request->all();
            //dd($data);

            if ($data['status']=="Active") {
                $status = 0;                                // Initial value is 1 (active) that set direct to database b4 and displayed as an active.  after user click to inactive, this toggle button will change to 0 value
            } else {
                $status = 1;    
            }
            
            Banner::where('id', $data['banner_id'])->update([
                'status' => $status,
            ]);

            return response()->json(['status'=>$status, 'banner_id'=>$data['banner_id']]);
        }       
    }

    public function addEditBanner(Request $request, $id=null)               // id = null sbb data tiada lagi
    {
        # code...
    }

    public function deleteBanner($id)                                       // deleteBanner - Option 1
    {   
        //Get Banner Image
        $bannerImage = Banner::findOrFail($id); 
        
        //Get Banner Image Path
        $banner_path = public_path().'/front/images/banners/'.$bannerImage->image;
        
        //Delete Brand Image from product folder if exists        
        if (File::exists($banner_path)) {
            File::delete($banner_path);
        }
    
        //Delete Brand Image Name from brands table             
        $bannerImage->delete();
        return redirect()->back()->with('success_message', 'Banner deleted successfully!');
    }

    public function deleteBanner1($id)                                      // deleteBanner - Option 2
    {
        //Get Brand Image
        $brandImage = Banner::where('id', $id)->first();

        //Get Brand Image Path
        $banner_path = 'front/images/banners/';

        //Delete Brand Image from product folder if exists
        if (file_exists($banner_path.$brandImage->image)) {
            unlink($banner_path.$brandImage->image);
        }

        //Delete Brand Image Name from brands table
        $brandImage->delete();

        return redirect()->back()->with('success_message', 'Brand image deleted successfully!'); 
    }

    public function deleteBannerImage($id)
    {
        //Get Brand Image
        

        //Get Brand Image Path
    

        //Delete Brand Image from product folder if exists
        
    
        //Delete Brand Image Name from brands table

        return redirect()->back()->with('success_message', 'Banner deleted successfully!');
    }
}
