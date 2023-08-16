<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    
    //To get categories and parent categories for products
    //we can use relationships like BelongsTo, HasMany.
    //Or another way, this relationship can be done with a joint table of Products and Categories
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id')->with('parentcategory');
    }
}
