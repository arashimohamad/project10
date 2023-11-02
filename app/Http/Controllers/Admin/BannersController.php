<?php

namespace App\Http\Controllers\Admin;

use App\Models\Banner;
use App\Models\AdminsRole;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Session;

class BannersController extends Controller
{    
    public function banners()
    {
        Session::put('page', 'banners');                                    //Session::put setara dgn $request->session()->put('page', 'banners');
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
        //Add dan Edit buat kat sini        
        Session::put('page', 'banners');     

        if ($id == "") {
            $title = 'Add Banner';
            $banner = new Banner;
            $message = 'Banner added successfully!';
        } else {
            $title = 'Edit Banner';
            $banner = Banner::find($id);
            $message = 'Banner updated successfully!';
        }

        if ($request->isMethod('post')) {
            $data = $request->all();
            //echo"<pre>"; print_r($data); die;

            //Banner Validation and Checking if id is NULL then display validate
            if ($id == "") {            
                $rules = [
                    'bannertype'  => 'required',
                    'bannerimage' => 'required',                               
                ];

                $customMessages = [
                    'bannertype.required'  =>  'Banner Type is required',
                    'bannerimage.required' =>  'Banner Image is required',                
                ];
                
                $this->validate($request, $rules, $customMessages);           
            }


            //Upload Banner Image
            if ($request->hasfile('bannerimage')) {
                $image_tmp = $request->file('bannerimage');
                if ($image_tmp->isValid()) {
                    // Get image extension
                    $extension = $image_tmp->getClientOriginalExtension();

                    //Generate New Image Name
                    $imageName = rand(111,99999).'.'.$extension;        //123.jpg
                    $image_path = 'front/images/banners/'.$imageName;        

                    //Upload the Banner Image   
                    Image::make($image_tmp)->save($image_path);         //save image path on table admins
                    $banner->image = $imageName;
                }            
            }else if(!empty($data['hidden_image'])){
                $banner->image = $data['hidden_image'];
            }else{
                $banner->image = "";
            }

            //Isu kat sini bila update banner, maka banner yg sebelumnya masih lagi disimpan dlm image_path. 
            //Jika 10x update, maka akan ada 10 banner. 
            //Untuk itu kena checking sebelum update dgn laksanakan auto delete banner lama sebelum simpan banner baru
            
            //checking data is coming or not
            if (!isset($data['bannertitle'])) {
                $data['bannertitle'] = "";
            }

            if (!isset($data['banneralt'])) {
                $data['banneralt'] = "";
            }

            if (!isset($data['bannerlink'])) {
                $data['bannerlink'] = "";
            }
            
            // add or edit process
            $banner->type   = $data['bannertype'];
            $banner->title  = $data['bannertitle'];            
            $banner->alt    = $data['banneralt'];
            $banner->link   = $data['bannerlink'];
            $banner->sort   = $data['bannersort'];            
            $banner->status = 1;                            // Default = 1
            $banner->save();

            return redirect('admin/banners')->with('success_message', $message);            
        }

        return view('admin.banners.add_edit_banner', compact('title', 'banner'));        
    }

    public function deleteBanner($id)                                       // deleteBanner - Option 1
    {   
        //Get Banner Image
        $bannerImage = Banner::findOrFail($id); 
        
        //Get Banner Image Path
        $banner_path = public_path().'/front/images/banners/'.$bannerImage->image;
        
        //Delete Banner Image from product folder if exists        
        if (File::exists($banner_path)) {
            File::delete($banner_path);
        }
    
        //Delete Banner Image Name from banners table             
        $bannerImage->delete();
        return redirect()->back()->with('success_message', 'Banner deleted successfully!');
    }

    public function deleteBanner1($id)                                      // deleteBanner - Option 2
    {
        //Get Banner Image
        $bannerImage = Banner::where('id', $id)->first();

        //Get Banner Image Path
        $banner_path = 'front/images/banners/';

        //Delete Banner Image from product folder if exists
        if (file_exists($banner_path.$bannerImage->image)) {
            unlink($banner_path.$bannerImage->image);
        }

        //Delete Banner Image Name from banners table
        $bannerImage->delete();

        return redirect()->back()->with('success_message', 'Banner image deleted successfully!'); 
    }

    public function deleteBannerImage($id)
    {
        //Get Banner Image
        $bannerImage = Banner::select('image')->where('id', $id)->first();

        //Get Banner Image Path
        $banner_path = public_path().'/front/images/banners/'.$bannerImage->image;

        //Delete Banner Image from product folder if exists
        if (File::exists($banner_path)) {
            File::delete($banner_path);
        }
    
        //Delete Banner Image Name from banners table
        $deleteImage = Banner::where('id', $id)->update(['image'=>'']);

        return redirect()->back()->with('success_message', 'Banner deleted successfully!');
    }
}
