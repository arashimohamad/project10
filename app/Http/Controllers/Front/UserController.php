<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function loginUser(Request $request)
    {
        return view('front.users.login');
    }

    public function registerUser(Request $request)
    {
        return view('front.users.register');
    }
}
