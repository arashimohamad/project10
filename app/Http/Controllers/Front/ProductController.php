<?php

namespace App\Http\Controllers\Front;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Route;

class ProductController extends Controller
{
    public function listing(Request $request)
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
                                ->where('status', 1);                                
                                //->get();
                                //->get()->toArray(); 
            //dd($categoryProducts);

            // Update Query For Products Sorting
            if (isset($request['sort']) && !empty($request['sort'])) {                                    // we can use request->input('sort') instead of $request['sort'], but must include ublic function listing(Request $request)
                if ($request['sort'] == "product_latest") {
                    $categoryProducts->orderBy('id', 'DESC');
                } else if ($request['sort'] == "best_selling") {
                    $categoryProducts->where('is_bestseller', 'Yes');
                } else if ($request['sort'] == "best_rating") {
                    $categoryProducts->orderBy('id', 'DESC');
                } else if ($request['sort'] == "lowest_price") {
                    $categoryProducts->orderBy('final_price', 'ASC');
                } else if ($request['sort'] == "highest_price") {
                    $categoryProducts->orderBy('final_price', 'DESC');
                } else if ($request['sort'] == "featured_items") {
                    $categoryProducts->where('is_featured', 'Yes');
                } else if ($request['sort'] == "discounted_items") {
                    $categoryProducts->where('product_discount', '>', 0);
                } else {
                    $categoryProducts->orderBy('id', 'DESC');                                       // original query for orderBy('id', 'DESC')
                }
            }

            $categoryProducts = $categoryProducts->paginate(6);

            if ($request->ajax()) {
                return response()->json([
                    'view' => (String)View::make('front.products.ajax_products_listing', compact('categoryDetails', 'categoryProducts', 'url'))
                ]);
            } else {
                return view('front.products.listing', compact('categoryDetails', 'categoryProducts', 'url'));                
            }

        } else {
            
            abort(404);

        }                
    }
}
