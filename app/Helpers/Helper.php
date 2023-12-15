<?php

use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

// Get Total Cart Items by user id or session id
function totalCartItems() {
    if (Auth::check()) {
        $user_id = Auth::user()->id;                                                                                // Use user_id If user logged in
        $totalCartItems = Cart::where('user_id', $user_id)->sum('product_qty');
    } else {
        $session_id = Session::get('session_id');                                                                   // Use session_id If user NOT logged in
        $totalCartItems = Cart::where('session_id', $session_id)->sum('product_qty');
    }    
    return $totalCartItems;
}

// get cart items or products by checking first user auth and session
function getCartItems() {
    if (Auth::check()) {
        // If the user is logged in, check from Auth (user_id)
        $user_id  = Auth::user()->id;
        $getCartItems = Cart::with('product')->where('user_id', $user_id)->get()->toArray();                        // Cart::with('product') call function product() in Cart Model
    }else{
        // If the user is not logged in, check from Session (session_id)
        $session_id  = Session::get('session_id');
        $getCartItems = Cart::with('product')->where('session_id', $session_id)->get()->toArray();                  // Cart::with('product') call function product() in Cart Model
    }
    return $getCartItems;
}