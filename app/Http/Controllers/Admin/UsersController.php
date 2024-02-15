<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\AdminsRole;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class UsersController extends Controller
{
    public function users() {
        Session::put('users');
        $users = User::get();

        //Set Admin/Subadmins Permission for User
        $usersModuleCount = AdminsRole::where(['subadmin_id'=>Auth::guard('admin')->user()->id, 'module'=>'users'])->count();       
        $usersModule= [];
        
        //Check if admin, so give a full access
        if (Auth::guard('admin')->user()->type == 'admin') {
            $usersModule['view_access'] = 1;
            $usersModule['edit_access'] = 1;
            $usersModule['full_access'] = 1;
        } else if($usersModuleCount == 0) {                     //if subadmin not set anything permission, give it message
            $message = "This feature is restricted for you!"; 
            return redirect('admin/dashboard')->with('error_message', $message);
        }else{                                                  //check if subadmin is set permission
            $usersModule = AdminsRole::where(['subadmin_id'=>Auth::guard('admin')->user()->id, 'module'=>'users'])->first();
        }

        return view('admin.users.users', compact('users', 'usersModule'));
    }

    public function updateUserStatus(Request $request) {       
        if ($request->ajax()) {
            $data = $request->all();
            //dd($data);

            if ($data['status']=="Active") {
                $status = 0;                                // Initial value is 1 (active) that set direct to database b4 and displayed as an active.  after user click to inactive, this toggle button will change to 0 value
            } else {
                $status = 1;    
            }
            
            User::where('id', $data['user_id'])->update([
                'status' => $status,
            ]);

            return response()->json(['status'=>$status, 'user_id'=>$data['user_id']]);
        }         
    }
}
