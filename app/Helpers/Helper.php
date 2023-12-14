<?php

use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

// Get Total Cart Items by user id or session id
function totalCartItems() {
    if (Auth::check()) {
        $user_id = Auth::user()->id;                                                                    // Use user_id If user logged in
        $totalCartItems = Cart::where('user_id', $user_id)->sum('product_qty');
    } else {
        $session_id = Session::get('session_id');                                                       // Use session_id If user NOT logged in
        $totalCartItems = Cart::where('session_id', $session_id)->sum('product_qty');
    }    
    return $totalCartItems;
}