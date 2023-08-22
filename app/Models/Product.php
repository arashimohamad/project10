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

    //Product filters will be displayed on add_edit_product blade   
    public static function productsFilters()
    {
        $productsFilters['fabricArray'] = ['Cotton', 'Polyester', 'Wool'];
        $productsFilters['sleeveArray'] = ['Full Sleeve', 'Half Sleeve', 'Short Sleeve', 'Sleeveless'];
        $productsFilters['patternArray'] = ['Checked', 'Plain', 'Printed', 'Self', 'Solid'];
        $productsFilters['fitArray'] = ['Regular', 'Slim'];
        $productsFilters['occasionArray'] = ['Casual', 'Formal'];

        return $productsFilters;
    }
    
    //Perform relation between products table and products_images table.
    //Other way is joint the products table and products_images table.  
    public function images()
    {
        return $this->hasMany(ProductsImage::class);
    }

    //Perform relation between products table and products_attributes table.
    //Other way is joint the products table and products_attributes table.
    public function attributes()
    {
        return $this->hasMany(ProductsAttribute::class);
    }
}   
