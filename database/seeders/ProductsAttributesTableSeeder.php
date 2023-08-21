<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ProductsAttribute;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductsAttributesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $productAttributeRecords = [
            ['id'=>1, 'product_id'=>1, 'size'=>"Small", 'sku'=>"BT001S", 'price'=>10, 'stock'=>100, 'status'=>1],
            ['id'=>2, 'product_id'=>1, 'size'=>"Medium", 'sku'=>"BT001M", 'price'=>15, 'stock'=>80, 'status'=>1],
            ['id'=>3, 'product_id'=>1, 'size'=>"Large", 'sku'=>"BT001L", 'price'=>20, 'stock'=>60, 'status'=>1],
            ['id'=>4, 'product_id'=>1, 'size'=>"Extra Large", 'sku'=>"BT001XL", 'price'=>25, 'stock'=>40, 'status'=>1],
            ['id'=>5, 'product_id'=>1, 'size'=>"Double Extra Large", 'sku'=>"BT001XXL", 'price'=>30, 'stock'=>30, 'status'=>1],
        ];

        ProductsAttribute::insert($productAttributeRecords);
    }
}
