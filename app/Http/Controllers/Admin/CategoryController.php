<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
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

        $getCategories = Category::getCategories();                     //recall function getCategories() dari Model Category dan baru boleh buat dropdown menu di blade
        //dd($getCategories);

        if ($id == "") {
            $title = 'Add Category';
            $category = new Category;
            $message = 'Category added successfully!';
        } else {
            $title = 'Edit Category';
            $category = Category::find($id);
            $message = 'Category updated successfully!';
        }

        if ($request->isMethod('post')) {
            $data = $request->all();

            //Category Validation
            if ($id == "") {
                $rules = [
                    'catname' => 'required',                
                    'url'     => 'required|unique:categories',           //unique:categories merujuk kpd data url dalam table categories
                ];
            } else {
                $rules = [
                    'catname' => 'required',
                    'url'     => 'required',
                ];
            }            

            $customMessages = [
                'catname.required' =>  'Category Name is required',
                'url.required'     =>  'Category URL is required',
                'url.unique'       =>  'Unique Category URL is required',
                'url.required'     =>  'URL is required',
            ];

            $this->validate($request, $rules, $customMessages);

            //Upload Category Image
            if ($request->hasfile('catimage')) {
                $image_tmp = $request->file('catimage');
                if ($image_tmp->isValid()) {
                    // Get image extension
                    $extension = $image_tmp->getClientOriginalExtension();

                    //Generate New Image Name
                    $imageName = rand(111,99999).'.'.$extension;        //123.jpg
                    $image_path = 'front/images/categories/'.$imageName;        

                    //Upload the Category Image   
                    Image::make($image_tmp)->save($image_path);         //save image path on table admins
                    $category->category_image = $imageName;
                }            
            }else if(!empty($data['hidden_image'])){
                $category->category_image = $data['hidden_image'];
            }else{
                $category->category_image = "";
            }

            if (empty($data['catdiscount'])) {
                $data['catdiscount'] = 0;                               //fasilitator ubah dlm table category dgn nilai 0 sbg default value.
            }
            
            // add or edit process
            $category->category_name     = $data['catname'];
            $category->parent_id         = $data['parentID'];            
            $category->category_discount = $data['catdiscount'];             
            $category->description       = $data['description'];
            $category->url               = $data['url']; 
            $category->meta_title        = $data['metatitle'];
            $category->meta_description  = $data['metadesc'];
            $category->meta_keywords     = $data['metakey'];
            $category->status            = 1;                            // Default = 1
            $category->save();

            return redirect('admin/categories')->with('success_message', $message);            
        }

        return view('admin.categories.add_edit_category', compact('title', 'getCategories', 'category'));
        
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