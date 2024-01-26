<?php

namespace Database\Seeders;

use App\Models\Coupon;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CouponsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $couponRecords = [
            ['id'=> 1,
            'coupon_option'=>'Manual',
            'coupon_code'=>'test10',
            'coupon_type'=>'Single',
            'amount_type'=>'Percentage',
            'amount'=>'10',
            'categories'=>'1,2,3,4,5,6,7,8,9,10,11',
            'brands'=>'1,2',
            'expiry_date'=>'2024-12-31',
            'users'=>'',
            'status'=>1],  
            
            ['id'=> 2,
            'coupon_option'=>'Manual',
            'coupon_code'=>'test20',
            'coupon_type'=>'Single',
            'amount_type'=>'Percentage',
            'amount'=>'20',
            'categories'=>'1,2,3,4,5,6,7,8,9,10,11',
            'brands'=>'1,2',
            'expiry_date'=>'2024-12-31',
            'users'=>'aamily@yahoo.com',
            'status'=>1],

            ['id'=> 3,
            'coupon_option'=>'Automatic',
            'coupon_code'=>'ZT64qSOX',
            'coupon_type'=>'Multiple',
            'amount_type'=>'Fixed',
            'amount'=>'100',
            'categories'=>'1,2,3,4,5,6,7,8,9,10,11',
            'brands'=>'1,2',
            'expiry_date'=>'2024-12-31',
            'users'=>'',
            'status'=>1],
        ];

        Coupon::insert($couponRecords);
    }
}
