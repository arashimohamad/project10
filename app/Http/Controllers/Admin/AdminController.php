<?php

namespace App\Http\Controllers\Admin;

use Validator;
use App\Models\User;
use App\Models\Admin;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use App\Models\AdminsRole;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    ###################
    # Admin Module 
    ###################

    public function dashboard() 
    {
        //Make dashboard as main page by session and give an active status on class at sidebar blade
        //This session::put purpose to make menu became highlight after user click on menu/submenu
        Session::put('page', 'dashboard');

        //To count users, brands,, products and categories
        $usersCount = User::get()->count();
        $brandsCount = Brand::get()->count();
        $productsCount = Product::get()->count();
        $categoriesCount = Category::get()->count();

        return view('admin.dashboard', compact('usersCount','brandsCount','productsCount','categoriesCount'));
    }

    public function login(Request $request) 
    {
        // Cek adakah betul method yg digunakan adalah post
        if ($request->isMethod('post')) {
            $data = $request->all();    //dd($data);

            //Tambah rules dan custom messages
            $rules = [
                'email'     => 'required|email|max:255',
                'password'  => 'required|max:30'
            ];

            $customMessage = [
                'email.required'     => "Email is required",
                'email.email'        => 'Valid Email is required',
                'password.required'  => "Password is required"
            ];

            $this->validate($request, $rules, $customMessage);

            //Sahkan data user dgn guard sama ada ia admin / tidak 
            if (Auth::guard('admin')->attempt(['email' => $data['email'], 'password' => $data['password']])) {

                //Remember Me (Email + Password) with cookies
                if (isset($data['remember']) && !empty($data['remember'])) {
                    setcookie("email", $data['email'], time()+3600);
                    setcookie("password", $data['password'], time()+3600);
                }else{
                    //We remove email+password cookies if user did not check the remember checkbox
                    setcookie("email", "");
                    setcookie("password", "");
                }

                return redirect("admin/dashboard");
            } else {
                return redirect()->back()->with("error_message", "Invalid Email or Password");
            }            
        }        
        
        return view('admin.login');
        
        /*
            Laravel best practise use the vendor login page, but for this activities, we developed login/logout page by ourselves
            
            Steps To Create Admin Middleware to Protect Admin Routes - Multi Authentication - login page 
            1. make:model Admin 
            2. make:migration create_admins_table 
            3. run migration
            4. make:middleware Admin
            5. setting pada Authentication Guards dan User Providers
            6. setting App\Http\Middleware\Admin --> Buat checking dalam function handle
            7. setting App\Http\Kernel --> Add class pada bahagian protected $middlewareAliases ('admin' => \App\Http\Middleware\Admin::class,)

            Insert Record into Admins Table with Seeder
            1. make:seeder AdminTableSeeder [C:\laragon\www\project10\database/seeders/AdminTableSeeder.php]
            2. setting AdminTableSeeder. please refer to [C:\laragon\www\project10\database/seeders/AdminTableSeeder.php]
            3. open the DatabaseSeeder.php and setting it to call AdminTableSeeder [$this->call(AdminTableSeeder::class);]
            4. run php artisan db:seed to insert data to table admins

            Admin Panel Login
            1. modified model Admin [class Admin extends Model to class Admin extends Authenticatable]

            Laravel 10 Tutorial #24 - Remember me Laravel functionality- Remember me functionality in Login Page
            1. you can check it the process using "New Private Window" / "New Incognito Window"
        */
    }

    public function logout() 
    {
        Auth::guard('admin')->logout();
        return redirect('admin/login');
        
        //Admin Panel Logout - add logout link on header.blade.php and add logout routes        
    }

    public function checkCurrentPassword(Request $request) 
    {
        $data = $request->all();
        //Hash::check($value, $hashedValue)
        // $value adalah $data['current_pwd']
        // $hashedValue adalah Auth::guard('admin')->user()->password
        if (Hash::check($data['current_pwd'],Auth::guard('admin')->user()->password)) {
            return "true";
        } else {
            return "false";
        }        
    }

    public function updatePassword(Request $request)
    {
        Session::put('page', 'update-password');
        if ($request->isMethod('post')) {
            $data = $request->all();                           // Ada baiknya gunakan option 1 krn ia request all(). Jadi x tahu yg mana 1 data yg dipanggil sbb ia pukul rata

            // $data['current_pwd'] adalah bersamaan dgn        option 1
            // $data=$request->current_pwd                      option 2
            // $data=$request->get('current_pwd')               option 3
            // $data=$request->input('current_pwd')             option 4

            //Check if current password is correct
            if (Hash::check($data['current_pwd'], Auth::guard('admin')->user()->password)) {
                //Check if new password and confirm password are matching
                if ($data['new_pwd'] == $data['confirm_pwd']) {
                    //Update new password
                    Admin::where('id', Auth::guard('admin')->user()->id)
                            ->update([
                                'password' => bcrypt($data['new_pwd'])
                            ]);
                    return redirect()->back()->with('success_message', "Password has been updated Successfully!");
                } else {
                    return redirect()->back()->with('error_message', "New password and Confirmation password not Match!");
                }
                
            } else {
                return redirect()->back()->with('error_message', "Your current password is Incorrect!!");
            } 
        }         
        return view('admin.update_password');     
    }    

    public function updateDetails(Request $request) 
    {
        Session::put('page', 'update-details');
        // Cek adakah betul method yg digunakan adalah post
        if ($request->isMethod('post')) {
            $data = $request->all();    //dd($data);

            //Tambah rules dan custom messages
            $rules = [
                'admin_name'    => 'required|regex:/^[\pL\s\-]+$/u|max:255',
                'admin_mobile'  => 'required|numeric',
                'admin_image'  => 'image',
                //'admin_mobile'  => 'required|numeric|digits:12'

            ];

            $customMessage = [
                'admin_name.required'   => "Name is required",
                'admin_mobile.regex'    => "Valid Name is required",
                'admin_mobile.max'      => "Valid Name is required",
                'admin_mobile.required' => "Mobile Is required",
                'admin_mobile.numeric'  => "Valid Mobile is required",
                'admin_image.image'     => "Valid Image is required",
                //'admin_mobile.digits'   => "Valid Mobile is required",
            ];

            $this->validate($request, $rules, $customMessage);

            // Upload Admin Image
            if ($request->hasfile('admin_image')) {
                $image_tmp = $request->file('admin_image');
                if ($image_tmp->isValid()) {
                    // Get image extension
                    $extension = $image_tmp->getClientOriginalExtension();

                    //Generate New Image Name
                    $imageName = rand(111,99999).'.'.$extension;        //123.jpg
                    $image_path = 'admin/photos/'.$imageName;           
                    Image::make($image_tmp)->save($image_path);         //save image path on table admins
                }
            } else if(!empty($data['hidden_image'])) {
                $imageName = $data['hidden_image'];
            }else{
                $imageName = "";
            }
            
            // Update Admin Details
            Admin::where('email', Auth::guard('admin')->user()->email)
                    ->update([
                        'name'      => $data['admin_name'],
                        'mobile'    => $data['admin_mobile'],
                        'image'     => $imageName,
                    ]);

            return redirect()->back()->with('success_message', "Admin Details has been updated successfully!");
        }  
        return view('admin.update_details');

        /*
            Update Admin Details - Upload Admin Image (Install Intervention)
            1. download intervention/image using composer [composer require intervention]/image]
        */
    }

    ###################
    # Subadmin Module
    ###################

    public function subadmins(Request $request)
    {
        Session::put('page', 'subadmins');                                  // Session for highlight menu title after user click menu title
        //Call data type as subadmins from admins table
        $subadmins = Admin::where('type', 'subadmin')->get();
        return view('admin.subadmins.subadmins', compact('subadmins'));
    }
    
    public function updateSubadminStatus(Request $request)
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
            
            Admin::where('id', $data['subadmin_id'])->update([
                'status' => $status,
            ]);

            return response()->json(['status'=>$status, 'subadmin_id'=>$data['subadmin_id']]);

        } 
    }

    public function addEditSubadmin(Request $request, $id=null)            // id = null sbb data tiada lagi
    {   //Add dan Edit buat kat sini
        Session::put('page','cms-pages');

        if ($id =="") {
            $title = "Add Subadmin";
            $subadmindata = new Admin;                             //add process
            $message = "Subadmin added successfully";

        } else {
            $title = "Edit Subadmin";
            $subadmindata = Admin::find($id);                     //edit process
            $message = "Subadmin updated successfully";
        }

        if ($request->isMethod('post')) {
            $data = $request->all();
            //dd($data);    //echo "<pre>"; print_r($data); die();

            //Email is unique. Have to check first whether it exists or not in the admins table. Can't have the same email!!
            if ($id == "") {
                $subadminCount = Admin::where('email', $data['email'])->count(); 
                //If an email existed. return false
                if ($subadminCount > 0) {
                    return redirect()->back()->with('error_message', "Subadmin email already exist!");
                }                 
            }
            
            //Subadmin Validation
            $rules = [
                'name'      =>  'required|regex:/^[\pL\s\-]+$/u|max:255',
                'mobile'    =>  'required|numeric',
                'email'     => 'required|email|max:255',
                'password'  => 'required|max:30',
                'image'     => 'image',
            ];

            $customMessages = [
                'name.required'     => "Name is required",                
                'mobile.regex'      => "Valid Name is required",
                'mobile.max'        => "Valid Name is required",
                'mobile.required'   => "Mobile Is required",
                'mobile.numeric'    => "Valid Mobile is required",              
                'email.required'    => "Email is required",
                'email.email'       => 'Valid Email is required',
                'password.required' => "Password is required",
                'image.image'       => "Valid Image is required",
            ];

            $this->validate($request, $rules, $customMessages);                   

            // Upload Subadmin Image
            if ($request->hasfile('image')) {
                $image_tmp = $request->file('image');
                if ($image_tmp->isValid()) {
                    // Get image extension
                    $extension = $image_tmp->getClientOriginalExtension();

                    //Generate New Image Name
                    $imageName = rand(111,99999).'.'.$extension;        //123.jpg
                    $image_path = 'admin/photos/'.$imageName;           
                    Image::make($image_tmp)->save($image_path);         //save image path on table admins
                }
            } else if(!empty($data['current_image'])) {
                $imageName = $data['current_image'];
            }else{
                $imageName = "";
            }

            //add + edit  process
            $subadmindata->image    = $imageName;            
            $subadmindata->name     = $data['name'];
            $subadmindata->mobile   = $data['mobile'];
            if ($id =="") {               
                $subadmindata->email    = $data['email'];
                $subadmindata->type     = 'subadmin';
                $subadmindata->status   = 1;
            }
            if ($data['password'] != "") {
                $subadmindata->password = bcrypt($data['password']);                  
            }

            $subadmindata->save();

            return redirect('admin/subadmins')->with('success_message', $message);

        }

        return view('admin.subadmins.add_edit_subadmin', compact('title', 'subadmindata'));
        
    }

    public function deleteSubadmin($id)
    {           
        $admin = Admin::findOrFail($id);        
        $image_path = public_path().'/admin/photos/'.$admin->image;

        //Check and delete file image
        if (File::exists($image_path)) {
            File::delete($image_path);
        }

        $admin->delete();

        return redirect()->back()->with('success_message', 'Subadmin deleted successfully');   

        //please refer to https://www.itsolutionstuff.com/post/how-to-delete-file-from-public-folder-storage-folder-in-laravelexample.html
    }

    public function updateRole(Request $request, $id)           //$id is refer to subadmin_id
    {         
        if ($request->isMethod('post')) {
            $data = $request->all();                            //dd($data);  //echo "<pre>"; print_r($data); die();

            //We are going to make subadmin roles & permission empty b4 assigning a new permission 
            //Delete all earlier roles for Subadmin. We want 1 data ONLY exist in AdminsRole table if user save it many times
            AdminsRole::where('subadmin_id', $id)->delete();

            //OPTION 1
            //Add new roles for Subadmin Dynamically
            foreach ($data as $key => $value) {                 //[$key]=>['value'] ---> ['cms_pages']['view'] = 1; 
                //check the value of view is coming / not
                if (isset($value['view'])) {
                    //dd($key);                                 //cms_pages
                    //echo "<pre>"; print_r($value); die();      
                    $view = $value['view'];                     //Array ([view] => 1)                     
                } else {
                    $view = 0;
                }

                if (isset($value['edit'])) {
                    $edit = $value['edit'];                     //Array ([edit] => 1)
                } else {
                    $edit = 0;
                }

                if (isset($value['full'])) {                    //Array ([full] => 1)
                    $full = $value['full'];
                } else {
                    $full = 0;
                }   
                
                AdminsRole::where('sudadmin_id', $id)->insert([
                    'subadmin_id' => $id,
                    'module'      => $key,
                    'view_access' => $view,
                    'edit_access' => $edit,
                    'full_access' => $full,
                ]);

                /*
                    Penerangan: 
                    Array ([view] => 1) bersamaan dengan $data[$key][$value] = $data['cms_pages']['view'] = 1, rujuk OPTION 2.
                    $key = 'cms_pages' ---> nama module (cms_pages/categories/products/brands)
                    $value = 'view'  ---> 'view/edit/full' ini drpd blade 
                    $data[$key][$value] = $data['cms_pages']['view'] = ['cms_pages']['view'] = 1
                    $key telah termasuk secara automatik ada pun $value['view'] = 1 
                */
            }

            /*
                $role = new AdminsRole;
                $role->subadmin_id  = $id;
                $role->module       = $key;                         //$key based on name="products[view]" ---> "products" is refer to the key. Refer to penerangan above
                $role->view_access  = $view;                        //name="products[view]" value="1/0"
                $role->edit_access  = $edit;                        //name="products[edit]" value="1/0"
                $role->full_access  = $full;                        //name="products[full]" value="1/0"
                $role->save();
            */
            
            /*  
                //OPTION 2
                //Add new roles for Subadmin
                //check if permission value 1 or 0 after user submit permission
                if (isset($data['cms_pages']['view'])) {
                    $cms_pages_view = $data['cms_pages']['view'];       // value = 1. refer to blade : name="cms_pages[view]"
                } else {
                    $cms_pages_view = 0;
                }
                
                if (isset($data['cms_pages']['edit'])) {
                    $cms_pages_edit = $data['cms_pages']['edit'];       // value = 1. refer to blade : name="cms_pages[edit]"
                } else {
                    $cms_pages_edit = 0;
                }

                if (isset($data['cms_pages']['full'])) {
                    $cms_pages_full = $data['cms_pages']['full'];       // value = 1. refer to blade : name="cms_pages[full]"
                } else {
                    $cms_pages_full = 0;
                }

                $role = new AdminsRole;
                $role->subadmin_id  = $id;
                $role->module       = 'cms_pages';
                $role->view_access  = $cms_pages_view;
                $role->edit_access  = $cms_pages_edit;
                $role->full_access  = $cms_pages_full;
                $role->save();
            */            
            
            $message = "Subadmin Roles updated successfully!";
            
            return redirect()->back()->with('success_message', $message);
        }
        
        //get a list subadminRoles to make checkbox is checked
        $subadminRoles = AdminsRole::where('subadmin_id', $id)->get();

        $subadminName = Admin::where('id', $id)->first();
        $title = "Update ".$subadminName->name." Subadmin Roles/Permission";
        $subadminAccount = "Subadmin Account :<strong>&nbsp;".$subadminName->name."</strong>";  

        return view('admin.subadmins.update_roles', compact('id', 'title', 'subadminAccount', 'subadminRoles'));

        /*
            Laravel 10 Tutorial #29 - Roles and Permissions in Laravel 10 (V) - Set Permissions for Sub Admins
            1. php artisan make:migration create_admins_roles_table --> setup field name
            2. php artisan migrate ---> create_admins_roles_table.php
            3. php artisan make:model AdminsRole
        */
    }

    public function updateRoleOLD(Request $request, $id)                      //$id merujuk kpd subadmin_id
    {                
        $title = "Update Subadmin Roles/Permission";
        $subadminName = Admin::where('id', $id)->first();
        $subadminAccount = "Subadmin Account :<strong>&nbsp;".$subadminName->name."</strong>";        

        if ($request->isMethod('post')) {
            $data = $request->all(); 
            //dd($data);  
            //echo "<pre>"; print_r($data); die();

            //We are going to make subadmin roles & permission empty b4 assigning a new permission 

            //Delete all earlier roles for Subadmin. We want ONLY 1 data exist in AdminsRole table if user save it many times
            AdminsRole::where('subadmin_id', $id)->delete();

            //Add new roles for Subadmin
            //check if permission value 1 or 0 after user submit permission
            if (isset($data['cms_pages']['view'])) {
                $cms_pages_view = $data['cms_pages']['view'];       // value = 1. refer to blade : name="cms_pages[view]"
            } else {
                $cms_pages_view = 0;
            }
            
            if (isset($data['cms_pages']['edit'])) {
                $cms_pages_edit = $data['cms_pages']['edit'];       // value = 1. refer to blade : name="cms_pages[edit]"
            } else {
                $cms_pages_edit = 0;
            }

            if (isset($data['cms_pages']['full'])) {
                $cms_pages_full = $data['cms_pages']['full'];       // value = 1. refer to blade : name="cms_pages[full]"
            } else {
                $cms_pages_full = 0;
            }

            /*
                ia sama spt kemudi timur permission
                $menupurc = $request->input('menu_purc');
                if ($menupurc == '1') {
                    $staffstore->menu_purc  = '1';
                } else {
                    $staffstore->menu_purc  = '0';
                }
            */

            $role = new AdminsRole;
            $role->subadmin_id  = $id;
            $role->module       = 'cms_pages';
            $role->view_access  = $cms_pages_view;
            $role->edit_access  = $cms_pages_edit;
            $role->full_access  = $cms_pages_full;
            $role->save();
            
            $message = "Subadmin Roles updated successfully!";

            return redirect()->back()->with('success_message', $message);
        }

        //get a list to make checkbox is checked
        $subadminRoles = AdminsRole::where('subadmin_id', $id)->get();

        return view('admin.subadmins.update_roles', compact('id', 'title', 'subadminAccount', 'subadminRoles'));

        /*
            Laravel 10 Tutorial #29 - Roles and Permissions in Laravel 10 (V) - Set Permissions for Sub Admins
            1. php artisan make:migration create_admins_roles_table --> setup field name
            2. php artisan migrate ---> create_admins_roles_table.php
            3. php artisan make:model AdminsRole
        */
    }

}

// tutorial completed 31 