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
}


// tutorial completed 35 

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

*/