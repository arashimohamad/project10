<?php

namespace App\Models;

use Illuminate\Support\Arr;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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

    public static function getDynamicFilters($catIds)                                  // Part 1.0 - Fabric,Sleeve, Fit, Occasion, Pattern , etc...
    {
        $getProductIds = Product::select('id')
                        ->whereIn('category_id', $catIds)                             
                        ->pluck('id'); 
        
        $getFilterColumns = ProductsFilter::select('filter_name')
                            ->pluck('filter_name')
                            ->toArray();
        
        if (count($getFilterColumns) > 0) {
            $getFilterValues = Product::select($getFilterColumns)
                                ->where('status', 1)
                                ->whereIn('id', $getProductIds)
                                ->get()
                                ->toArray();
        } else {

            $getFilterValues = Product::where('status', 1)
                                ->whereIn('id', $getProductIds)
                                ->get()
                                ->toArray();
        }

        //Syntax array_filter(array, callbackfunction, flag) --->w3school
        //Syntax array_filter( array $array [, callable $callback [, int $flag = 0 ]]): array
        //Syntax array_unique( array $array [, int $sort_flags = SORT_STRING ])
        $getFilterValues = array_filter(array_unique(Arr::flatten($getFilterValues)));   
        
        $getCategoryFilterColumns = ProductsFilter::select('filter_name')
                                    ->where('status', 1)
                                    ->whereIn('filter_value', $getFilterValues)
                                    ->groupBy('filter_name')
                                    ->orderBy('sort', 'ASC')
                                    ->pluck('filter_name')
                                    ->toArray();

        return $getCategoryFilterColumns;
    }

    public static function selectedFilters($catIds, $filter_name)                      // Part 1.1 - Fabric (cottom/polyester),Fit (regular/slim), etc...
    {
        $productFilters = Product::select($filter_name)
                            ->whereIn('category_id', $catIds)
                            ->groupBy($filter_name)
                            ->get()
                            ->toArray();
        
        $productFilters = array_filter(Arr::flatten($productFilters));

        return $productFilters;
    }

    public static function filterTypes()                                               // Part 1.2 - Fabric (cottom/polyester),Fit (regular/slim), etc...
    {
        $filterTypes = ProductsFilter::select('filter_name')
                        ->where('status', 1)
                        ->groupBy('filter_name')
                        ->get()
                        ->toArray();
        //dd($filterTypes);
        
        $filterTypes = Arr::flatten($filterTypes);

        return $filterTypes;
    }
}
