<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductsController extends Controller
{
    //use doc_fun snippet to call public function name()    
    public function products()
    {
        //When we use "with('category')", make sure on Product Model has a relation (BelongTo, HasMany or etc).
        //Other way is joint table of Products and Categories
        
        //$products = Product::with('category')->get()->toArray();        // utk lihat susunan array yg cantik
        //dd($products);
        
        $products = Product::with('category')->get();
        return view('admin.products.products', compact('products'));
    }

    public function updateProductStatus(Request $request)              
    {        
        //echo "AAAA"; die;
        if ($request->ajax()) {
            $data = $request->all();
            //dd($data);
            //echo "<pre>"; print_r($data); die;

            if ($data['status']=="Active") {
                $status = 0;    // Initial value is 1 (active) that set direct to database b4 and displayed as an active.  after user click to inactive, this toggle button will change to 0 value
            } else {
                $status = 1;    
            }
            
            Product::where('id', $data['product_id'])->update(['status' => $status,]);

            return response()->json(['status'=>$status, 'product_id'=>$data['product_id']]);
        }         
    }

    public function addEditProduct(Request $request, $id=null)
    {
        //Add dan Edit buat kat sini        
        //Session::put('page', 'categories');                             //Session::put setara dgn $request->session()->put('page', 'categories');        

        if ($id == "") {
            # Add product
            $title   = "Add product";
            $product = new Product;
            $message = "Product added successfully!";
        } else {
            $title   = "Edit product";
            $product =  Product::find($id);
            $message = "Product updated successfully!";
        }

        //Get Categories and their Sub Categories
        $getCategories = Category::getCategories();                     //recall function getCategories() dari Model Category dan baru boleh buat dropdown menu di blade
        
        //Product filter that perform on product model
        $productsFilters = Product::productsFilters();
        //dd($productsFilters);
        
        return view('admin.products.add_edit_product', compact('title', 'product', 'getCategories', 'productsFilters'));
    }

    public function deleteProduct($id)
    {
        $product = Product::findOrFail($id)->delete();
        return redirect()->back()->with('success_message', 'Product deleted successfully!');   
    }
}
