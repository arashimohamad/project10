<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
{
    public function categories() 
    {
        Session::put('page','categories');                       // related use to highlight menu/submenu selection
        $categories = Category::with('parentcategory')->get();
        //dd($categories);
        return view('admin.categories.categories', compact('categories'));
    }

    public function updateCategoryStatus(Request $request)              
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
            
            Category::where('id', $data['category_id'])->update([
                'status' => $status,
            ]);

            return response()->json(['status'=>$status, 'category_id'=>$data['category_id']]);
        }         
    }

    public function addEditCategory(Request $request, $id=null)         // id = null sbb data tiada lagi
    {
        //Add dan Edit buat kat sini        
        Session::put('page', 'categories');                             //Session::put setara dgn $request->session()->put('page', 'categories');
        if ($id == "") {
            $title = 'Add Category';
            $category = new Category;
            $message = 'Category Added Successfully!';
        } else {
            $title = 'Edit Category';
            $category = Category::find($id);
            $message = 'Category Update Successfully';
        }

        return view('admin.categories.add_edit_category', compact('title'));
        //return view('dmin.categories.add_edit_category', compact('title', 'a'));
        
    }

    public function deleteCategory($id)
    {
        $category = Category::findOrFail($id)->delete();
        return redirect()->back()->with('success_message', 'Category deleted successfully');   
    }
}


// tutorial completed 36

/*
    Laravel 10 Tutorial #34 - Categories Module (I) - Create Table _ Insert Categories with Seeder
    1. Planning
    2. create categories table - [php artisan make:migration create_categories_table] + setting
    3. migrate categories table - [php artisan migrate]
    4. create model Category
    5. create CategoryController
    6. create CategoryTableSeeder - [php artisan make:seeder CategoryTableSeeder]
    7. insert all data into CategoryTableSeeder.php
    8. open DabatabseSeeder.php and type [$this->call(CategoryTableSeeder::class);]
    9. run php artisan db:seed

    Laravel 10 Tutorial #35 - Categories Module (II) - Display Categories in Admin Panel
    1. create route::get
    2. set categories on function. please refer public function categories() above
    3. setting up ui index for categories
    4. Added datatables on dashboard ui
    5. create relation hasOne on Category model
        public function parentcategory() {
            return $this->hasOne(Category::class, 'id', 'parent_id')->select('id', 'category_name', 'url')->where('status', 1);
        }
    6. call parentcategory() on public function categories() and set on ui index

    Laravel 10 Tutorial #36 - Categories Module (III) - Active_Inactive_Delete Categories in Admin Panel
    1. add Catalogue menu on sidebar
    2. add javascript to custom.js
    3. setting route

*/