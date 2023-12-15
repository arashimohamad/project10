<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cart extends Model
{
    use HasFactory;
    
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id')->with('brand', 'images');
    }
    
    //##################### function getCartItems() #############################
    
    // For Second Tutorial, we use getCartItems() from Helper.php as a global function. Please refer Helper.php by this path project10\app\Helpers
    
    // get cart items or products by checking first user auth and session                                                  // First tutorial
    // public static function getCartItems()
    // {
    //     if (Auth::check()) {
    //         // If the user is logged in, check from Auth (user_id)
    //         $user_id  = Auth::user()->id;
    //         $getCartItems = Cart::with('product')->where('user_id', $user_id)->get()->toArray();                        // Cart::with('product') call function product() above
    //     }else{
    //         // If the user is not logged in, check from Session (session_id)
    //         $session_id  = Session::get('session_id');
    //         $getCartItems = Cart::with('product')->where('session_id', $session_id)->get()->toArray();                  // Cart::with('product') call function product() above
    //     }
    //     return $getCartItems;
    // }
    
    //##################### function getCartItems() #############################
}
