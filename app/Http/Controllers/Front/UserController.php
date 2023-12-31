<?php

namespace App\Http\Controllers\Front;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
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
                $user->status = 0;
                $user->save();
    
                // Activate the user only when user confirms his email account


                // Send Confirmation Email 
                $email = $data['email'];
                $messageData = ['name'=>$data['name'], 'email'=>$data['email'], 'code'=>base64_encode($data['email'])];         // We use code with encode email user that register
                Mail::send('emails.confirmation', $messageData, function ($message) use($email){
                    $message->to($email)->subject('Confirm your ShopWise Account');
                });

                // Redirect v=back user with a success message 
                $redirectUrl = url('user/register');
                return response()->json(['status'=>true, 'type'=>'success', 'redirectUrl'=>$redirectUrl, 
                'message'=>'Please confirm your email to activate your ShopWise Account']);

                // User can able to login as well with email after saving the data into the table
                /* if (Auth::attempt(['email' => $data['email'], 'password' => $data['password']])) {   

                    // Send Register Email
                    $email = $data['email'];
                    $messageData = ['name'=>$data['name'], 'mobile'=>$data['mobile'], 'email'=>$data['email']];
                    Mail::send('emails.register', $messageData, function ($message) use($email){
                        $message->to($email)->subject('Welcome to ShopWise');
                    });

                    $redirectUrl = url('cart');
                    return response()->json(['status'=>true, 'type'=>'success', 'redirectUrl'=>$redirectUrl]);
                } */

            }else {

                return response()->json(['status'=>false, 'type'=>'validation', 'errors'=>$validator->messages()]);

            }
        }
        return view('front.users.register');
    }

    public function confirmAccount($code){
        $email = base64_decode($code);
        $userCount = User::where('email', $email)->count();

        if($userCount > 0) {
            $userDetails = User::where('email', $email)->first();

            if ($userDetails->status == 1) {

                // Redirect user to login page with the error message
                return redirect('user/login')->with('error_message', 'Your account is already activated and can login now');

            } else {

                User::where('email', $email)->update(['status' => 1]);

                // Send Welcome Email
                $messageData = ['name'=>$userDetails->name, 'mobile'=>$userDetails->mobile, 'email'=>$email];
                Mail::send('emails.register', $messageData, function ($message) use($email){
                    $message->to($email)->subject('Welcome to ShopWise');
                });

                // Redirect the user to the Login Page with success message
                return redirect('user/login')->with('success_message', 'Your account is activated. You can login now');
                $redirectUrl = url('cart');
                return response()->json(['status'=>true, 'type'=>'success', 'redirectUrl'=>$redirectUrl]);
            }
            
        } else {
            abort(404);
        }
    }

    public function logoutUser(Request $request){
        Auth::logout();
        return redirect('user/login'); 
    }

}