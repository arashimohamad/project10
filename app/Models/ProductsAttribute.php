<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductsAttribute extends Model
{
    use HasFactory;

    
    public static function productStock($product_id, $size)                                     // create the productStock function at the ProductsAttribute.php model to check the product attribute stock by product id and size.
    {
        $productStock = ProductsAttribute::select('stock')
                        ->where(['product_id' => $product_id, 'size' => $size])
                        ->first();

        return $productStock->stock;
    }
}
