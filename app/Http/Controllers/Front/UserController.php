<?php

namespace App\Http\Controllers\Front;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function loginUser(Request $request){
        return view('front.users.login');
    }

    public function registerUser(Request $request){
        if ($request->ajax()) {
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
                return response()->json(['redirectUrl'=>$redirectUrl]);
            }
        }

        return view('front.users.register');
    }
}
