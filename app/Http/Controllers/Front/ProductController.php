<?php

namespace App\Http\Controllers\Front;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;

class ProductController extends Controller
{
    public function listing()
    {
        $url = Route::getFacadeRoot()->current()->uri;

        // Check if the category exists or not. 
        // If not exists then we will return the user to 404 page

        $categoryCount = Category::where(['url' => $url, 'status' => 1])->count();
        
        if ($categoryCount > 0) {
            // echo "Category exists";
            
            // Now we will create categoryDetails function in Category model to get the category details and category id's. 
            // If user opens the parent category url then we will get category id of parent as well as sub categories.

            // Get Category Detail and categoryDetails($url) get from App\Models\Category;
            $categoryDetails = Category::categoryDetails($url);
            
            // Get Category and their Sub Category Products
            $categoryProducts = Product::with(['brand', 'images'])
                                ->whereIn('category_id', $categoryDetails['catIds'])                // whereIn - Compare category_id on product table vs id on category table
                                ->where('brand_id','>', 0)                                          // brand_id > 0 because may be user forgot to / not select brand during add/update products. So we filter here
                                ->where('status', 1)
                                ->orderBy('id', 'DESC')
                                ->get();
                                //->get()->toArray(); 
            //dd($categoryProducts);

            return view('front.products.listing', compact('categoryDetails', 'categoryProducts'));

        } else {
            
            abort(404);

        }                
    }
}
