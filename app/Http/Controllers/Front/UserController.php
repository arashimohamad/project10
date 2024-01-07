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
        if ($request->ajax()) {
            $data = $request->all();
            //echo "<pre>"; print_r($data); die;  

            $validator = Validator::make($request->all(), [
                'email' => 'required|email|max:250|exists:users',                    //exists:users is to trigger whether email existed or not on users table
                'password' => 'required|string|min:6'
            ],
            [
                'email.exists' => 'Email does not exists'
            ]);

            if ($validator->passes()) {

                // Remember User Email and Password (Remember Me)
                if (!empty($data['remember-me'])) {
                    setcookie("user-email", $data['email'], time()+3600);           // 3600 second = 60 minutes and we can upgrade timing as we want
                    setcookie("user-password", $data['password'], time()+3600);     // 3600 second = 60 minutes and we can upgrade timing as we want
                } else {
                    setcookie("user-email");                                        // if checkbox is not check for Remember Me at that time, we are ging to empty this cookies
                    setcookie("user-password");
                }                

                if (Auth::attempt(['email' => $data['email'], 'password' => $data['password']])) { 
                    
                    if (Auth::user()->status == 0) {
                        Auth::logout();
                        return response()->json(['status'=>false, 'type'=>'inactive', 'message'=>'Your account is not activated yet!']);
                    }

                    $redirectUrl = url('cart');
                    return response()->json(['status'=>true, 'type'=>'success', 'redirectUrl'=>$redirectUrl]);
                } else {
                    return response()->json(['status'=>false, 'type'=>'incorrect', 'message'=>'You have entered invalid email or password!']);
                }

            } else {

                return response()->json(['status'=>false, 'type'=>'error', 'errors'=>$validator->messages()]);
            }
        }
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

    public function forgotPassword(Request $request){
        if($request->ajax()) {
            $data = $request->all();
            //echo "<pre>"; print_r($data); die;  

            // Check email is valid or not
            $validator = Validator::make($request->all(), [
                'email' => 'required|email|max:250|exists:users',                    //exists:users is to trigger whether email existed or not on users table                
            ],
            [
                'email.exists' => 'Email does not exists'
            ]);

            if ($validator->passes()) {
                
                // Send Email to User with Reset Password
                $email = $data['email'];
                $messageData = ['email' => $email, 'code' => base64_encode($email)];
                Mail::send('emails.reset_password', $messageData, function ($message) use($email){
                    $message->to($email)->subject('Reset your Password - ShopWise');
                });

                // Show success message
                return response()->json(['type'=>'success', 'message'=>'We have e-mailed your password reset link']);

            } else {
                return response()->json(['status'=>false, 'type'=>'error', 'errors'=>$validator->messages()]);
            }
            

        } else {
            return view('front.users.forgot_password');
        }
    }

    public function resetPassword(Request $request, $code=null){
        if($request->ajax()) {
            $data = $request->all();
            //echo "<pre>"; print_r($data); die;   

            $email = base64_decode($data['code']);                                          // Decode the email
            $userCount = User::where('email', $email)->count();                             // Check email whether is valid or not

            if ($userCount) {
                //Update New Password
                User::where('email', $email)->update(['password'=>bcrypt($data['password'])]);

                // Send Confirmation Email to User
                $messageData = ['email' => $email];
                Mail::send('emails.new_password_confirmation', $messageData, function ($message) use($email){
                    $message->to($email)->subject('Password Updated - ShopWise');
                });

                // Show success message
                return response()->json(['type'=>'success', 'message'=>'Password reset for your account. You can login now.']);

            } else {
                abort('404');
            }   

        } else {
            return view('front.users.reset_password', compact('code'));
        }
    }

    public function logoutUser(Request $request){
        Auth::logout();
        return redirect('user/login'); 
    }
}