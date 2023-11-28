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

    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id');
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

    // Get Attribute Price Base On Size. 
    // Refer to public function getAttributePrice(Request $request) under ProductController.php
    public static function getAttributePrice($product_id, $size)
    {
        $attributePrice = ProductsAttribute::where(['product_id' => $product_id,'size' => $size])                            
                            ->where('status', 1)
                            ->first()
                            ->toArray();
        
        // For Getting Product Discount 
        $productDetails = Product::select(['product_discount','category_id', 'brand_id'])
                            ->where('id', $product_id)
                            ->where('status', 1)
                            ->first()
                            ->toArray();

        // For Getting Category Discount
        $categoryDetails = Category::select(['category_discount'])
                            ->where('id', $productDetails['category_id'])
                            ->where('status', 1)
                            ->first()
                            ->toArray(); 

        // For Getting Brand Discount
        $brandDetails = Brand::select(['brand_discount'])
                            ->where('id', $productDetails['brand_id'])
                            ->where('status', 1)
                            ->first()
                            ->toArray(); 

        // Check discount base on priority
        if ($productDetails['product_discount'] > 0) { 

            // 1st case if there is any Product Discount
            $discount = $attributePrice['price'] * $productDetails['product_discount']/100;                 // perform calculation for Product Discount
            $discount_percent = $productDetails['product_discount'];
            $final_price = $attributePrice['price'] - $discount;             
        
        }else if ($categoryDetails['category_discount'] > 0) {

            // 2nd case if there is any Category Discount
            $discount = $attributePrice['price'] * $categoryDetails['category_discount']/100;               // perform calculation for Category Discount
            $discount_percent = $categoryDetails['category_discount'];
            $final_price = $attributePrice['price'] - $discount;             
        
        }else if ($brandDetails['brand_discount'] > 0) {

            // 3rd case if there is any Brand Discount
            $discount = $attributePrice['price'] * $brandDetails['brand_discount']/100;                     // perform calculation for Brand Discount
            $discount_percent = $brandDetails['brand_discount'];
            $final_price = $attributePrice['price'] - $discount;             
        
        }else{

            // 4th if there is no discount
            $discount = 0;                                                                                  // perform calculation for No Discount
            $discount_percent = 0;
            $final_price = $attributePrice['price'];
        }

        return array('product_price'=>$attributePrice['price'], 'discount'=>$discount, 'final_price'=>$final_price, 'discount_percent'=>$discount_percent);
    }

    // Get Product Status
    public static function productStatus($product_id)
    {
        $productStatus = Product::select('status')->where('id', $product_id)->first();

        return $productStatus->status;
    }
}   