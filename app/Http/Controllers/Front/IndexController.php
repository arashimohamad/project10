<?php

namespace App\Http\Controllers\Front;

use App\Models\Banner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function index()
    {
        $homeSliderBanners = Banner::where('type', 'Slider')->where('status', 1)->orderBy('sort', 'ASC')->get();
        $homeFixBanners = Banner::where('type', 'Fix')->where('status', 1)->orderBy('sort', 'ASC')->get();
        
        return view('front.index', compact('homeSliderBanners', 'homeFixBanners'));
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
