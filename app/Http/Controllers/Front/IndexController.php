<?php

namespace App\Http\Controllers\Front;

use App\Models\Banner;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function index()
    {
        //Get homepage slider banners
        $homeSliderBanners = Banner::where('type', 'Slider')->where('status', 1)->orderBy('sort', 'ASC')->get();
        
        //Get homepage fix banners
        $homeFixBanners = Banner::where('type', 'Fix')->where('status', 1)->orderBy('sort', 'ASC')->get();     
        
        //Get new arrival products from the last 4 id's entrance and we includes the brand + image products. Please refer function brand and images from Product Model
        $newProducts = Product::with(['brand', 'images'])->where('status', 1)->orderBy('id', 'DESC')->limit(4)->get();   
        
        //Get best seller and we includes the brand + image products. Please refer function brand and images from Product Model
        $bestSellers = Product::with(['brand', 'images'])->where( ['status' => 1, 'is_bestseller' => 'Yes'] )->inRandomOrder()->limit(4)->get();  
        //dd($bestSellers);
        
        return view('front.index', compact('homeSliderBanners', 'homeFixBanners', 'newProducts', 'bestSellers'));
    }

    public function A()
    {
        # code...
    }

    public function B()
    {
        # code...
    }
}
