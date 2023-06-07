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

    /*
        //Option 2
        public function parentcategory() 
        {
            return $this->hasOne('App\Models\Category', 'id', 'parent_id')->select('id', 'category_name', 'url')->where('status', 1);
        } 
    */

    //$this->hasOne(Category::class, 'id', 'parent_id') equally select * from categories where id =1 and where parent id=0
    //Category::class = App\Models\Category
}
