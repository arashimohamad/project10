<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    //create the parent relation to check whether the category having any parent category or not

    //Option 1
    public function parentcategory()
    {
        return $this->hasOne(Category::class, 'id', 'parent_id')->select('id', 'category_name', 'url')->where('status', 1);
    }

    /*  Option 2
        public function parentcategory() 
        {
            return $this->hasOne('App\Models\Category', 'id', 'parent_id')->select('id', 'category_name', 'url')->where('status', 1);
        } 
    */

    //$this->hasOne(Category::class, 'id', 'parent_id') equally select * from categories where id=1 and where parent id=0
    //Category::class = App\Models\Category

    public function subcategories()
    {   
        return $this->hasMany(Category::class, 'parent_id')->where('status', 1);         // sintaks return $this->hasMany(Category::class, 'foreign_key', 'local_key');     
    }

    //Perform One Category Level 
    public static function getCategories() 
    {
        //lepas tu call function ni dlm addEditController
        $getCategories = Category::with(['subcategories'=>function($query) {
                                $query->with('subcategories');                           // perform sub sub categories
                            }])
                            ->where('parent_id', 0)
                            ->where('status', 1)
                            ->get();                                                     // call in the blade as {{cat->category_name}}
                            //->toArray();                                               // call in the blade as {{cat['category_name']}}
        
        //dd($getCategories);
        return $getCategories;
    }

    // Now we will create categoryDetails function in Category model to get the category details and category id's. 
    // If user opens the parent category url then we will get category id of parent as well as sub categories. 
    // This public static function categoryDetails($url) below is refer to function listing() under Front/ProductController.

    public static function categoryDetails($url)
    {
        $categoryDetails = Category::select('id', 'parent_id', 'category_name','url')
                            ->with('subcategories')->where('url', $url)
                            ->first()->toArray();        

        // Take 1 array, let's say as $catIds to get subcategory (tshirts/shirts/jackets/etc...)

        $catIds = array();
        $catIds[] = $categoryDetails['id'];                                             // Get only category id --> id(4) = men
        
        foreach ($categoryDetails['subcategories'] as $subcat) {                        // Get category id (4) > subcategory id (8,15,16) > subsubcategory id (if existed)
            $catIds[] = $subcat['id'];                                                  // Output: men > tshirts/shirts/jackets/etc... > subsubcategory id (if existed)
        }

        // Breadcrumbs Display
        if ($categoryDetails['parent_id'] == 0 || $categoryDetails['parent_id'] == 1 || $categoryDetails['parent_id'] == 2 || $categoryDetails['parent_id'] == 3|| $categoryDetails['parent_id'] == 7) {
            # Only Show Main Category in Breadcrumb
            $breadcrumbs = '<a class="gl-tag btn--e-brand-shadow" href="'.url($categoryDetails['url']).'">'
                                .$categoryDetails['category_name'].
                            '</a>';
        } else {
            # Show Main + Sub Category in Breadcrumb
            $parentCategory = Category::select('category_name', 'url')->where('id', $categoryDetails['parent_id'])->first();
        
            $breadcrumbs = '<a class="gl-tag btn--e-brand-shadow" href="'.url($parentCategory['url']).'">'
                                .$parentCategory['category_name'].
                            '</a><a class="gl-tag btn--e-brand-shadow" href="'.url($categoryDetails['url']).'">'
                                .$categoryDetails['category_name'].
                            '</a>';                            
        }
        
        return array('catIds'=>$catIds, 'categoryDetails'=>$categoryDetails, 'breadcrumbs'=>$breadcrumbs);           // return ouput to the function listing() under Front/ProductController
    }
}
