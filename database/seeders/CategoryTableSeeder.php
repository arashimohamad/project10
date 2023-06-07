<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categoryRecords = [
            ['id'=>1, 'parent_id'=>0, 'category_name'=>'Clothing', 'category_image'=>NULL, 
            'category_discount'=>0, 'description'=>NULL, 'url'=>'clothing', 'meta_title'=>NULL, 
            'meta_description'=>NULL, 'meta_keywords'=>NULL,'status'=>1],
            
            ['id'=>2, 'parent_id'=>0, 'category_name'=>'Electronics', 'category_image'=>NULL, 
            'category_discount'=>0, 'description'=>NULL, 'url'=>'electronics', 'meta_title'=>NULL, 
            'meta_description'=>NULL, 'meta_keywords'=>NULL,'status'=>1],     
            
            ['id'=>3, 'parent_id'=>0, 'category_name'=>'Appliances', 'category_image'=>NULL, 
            'category_discount'=>0, 'description'=>NULL, 'url'=>'appliances', 'meta_title'=>NULL, 
            'meta_description'=>NULL, 'meta_keywords'=>NULL,'status'=>1],
            
            ['id'=>4, 'parent_id'=>1, 'category_name'=>'Men', 'category_image'=>NULL, 
            'category_discount'=>0, 'description'=>NULL, 'url'=>'men', 'meta_title'=>NULL, 
            'meta_description'=>NULL, 'meta_keywords'=>NULL,'status'=>1],    

            ['id'=>5, 'parent_id'=>1, 'category_name'=>'Women', 'category_image'=>NULL, 
            'category_discount'=>0, 'description'=>NULL, 'url'=>'women', 'meta_title'=>NULL, 
            'meta_description'=>NULL, 'meta_keywords'=>NULL,'status'=>1],
            
            ['id'=>6, 'parent_id'=>1, 'category_name'=>'Kids', 'category_image'=>NULL, 
            'category_discount'=>0, 'description'=>NULL, 'url'=>'kids', 'meta_title'=>NULL, 
            'meta_description'=>NULL, 'meta_keywords'=>NULL,'status'=>1],    

        ];

        Category::insert($categoryRecords);
    }
}
