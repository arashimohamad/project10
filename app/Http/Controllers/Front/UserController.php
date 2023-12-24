<?php

namespace App\Http\Controllers\Front;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function loginUser(Request $request){
        return view('front.users.login');
    }

    public function registerUser(Request $request){
        if ($request->ajax()) {

            $validator = Validator::make($request->all(), [
                'name' => 'required|string|max:250',
                'mobile' => 'required|numeric',                                       //'required|numeric|digits:13'
                'email' => 'required|email|max:250|unique:users',
                'password' => 'required|string|min:6'
            ],
            [
                'email.email' => 'Please enter the valid Email'
            ]);

            if ($validator->passes()) {                
                $data = $request->all();
                // echo "<pre>"; print_r($data); die;  
    
                //Register the User
                $user = new User;
                $user->name = $data['name'];
                $user->mobile = $data['mobile'];
                $user->email = $data['email'];
                $user->password = bcrypt($data['password']);
                $user->status = 1;
                $user->save();
    
                //User can able to login as well with email after saving the data into the table
                if (Auth::attempt(['email' => $data['email'], 'password' => $data['password']])) {   
                    $redirectUrl = url('cart');
                    return response()->json(['status'=>true, 'type'=>'success', 'redirectUrl'=>$redirectUrl]);
                }

            }else {

                return response()->json(['status'=>false, 'type'=>'validation', 'errors'=>$validator->messages()]);

            }
        }
        return view('front.users.register');
    }

    public function logoutUser(Request $request){
        Auth::logout();
        return redirect('user/login'); 
    }

}
