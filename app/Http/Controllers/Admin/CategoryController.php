<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
}


// tutorial completed 34 

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

*/