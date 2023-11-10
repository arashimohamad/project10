<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductsFilter extends Model
{
    use HasFactory;
    
    public static function getColors($catIds)
    {
        $getProductIds = Product::select('id')
                        ->whereIn('category_id', $catIds)                             // catIds represent to all category id, sub category id and sub sub category id
                        ->pluck('id');                                                // get only 1 id
        
        $getProductColors = Product::select('family_color')                           // $getProductColors is to know how many colors that product belong
                            ->whereIn('id', $getProductIds)                           // we use $getProductIds to gain product id that use a color
                            ->groupBy('family_color')                                 // groupBy() is used to avoid repeating colors
                            ->pluck('family_color');                                  // get only 1 item family color and not repeating color
        //dd($getProductColors);

        return $getProductColors;
    }

    public static function getSizes($catIds)
    {
        $getProductIds = Product::select('id')
                        ->whereIn('category_id', $catIds)                             
                        ->pluck('id');                                            
        
        $getProductSizes = ProductsAttribute::select('size')                           
                            ->where('status', 1)
                            ->whereIn('product_id', $getProductIds) 
                            ->groupBy('size')             
                            ->pluck('size');                                  
        
        return $getProductSizes;
    }

    public static function getBrands($catIds)
    {
        $getProductIds = Product::select('id')
                        ->whereIn('category_id', $catIds)                             
                        ->pluck('id'); 
        
        $getProductBrandIds = Product::select('brand_id')                           
                            ->whereIn('id', $getProductIds)                          
                            ->groupBy('brand_id')                                
                            ->pluck('brand_id');       

        $getProductBrands = Brand::select('id','brand_name')                           
                            ->where('status', 1)
                            ->whereIn('id', $getProductBrandIds) 
                            ->orderBy('brand_name', 'ASC')             
                            ->get()                                                    // use on blade ----> $brand->brand_name 
                            ->toArray();                                               // use on blade ----> $brand['brand_name'] 
                            
        return $getProductBrands;
    }
}
