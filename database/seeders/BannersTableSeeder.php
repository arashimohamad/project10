<?php

namespace Database\Seeders;

use App\Models\Banner;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BannersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $bannerRecords = [
            [                
                'id'=>1, 
                'image'=>'sitemaker-slider-banner-1.png',
                'type'=>'Slider',
                'link'=>'',
                'title'=>'T-Shirts Collection',
                'alt'=>'T-Shirts Collection',
                'sort'=>1,
                'status'=>1,
            ],

            [                
                'id'=>2, 
                'image'=>'sitemaker-slider-banner-2.png',
                'type'=>'Slider',
                'link'=>'',
                'title'=>'Women Collection',
                'alt'=>'Women Collection',
                'sort'=>2,
                'status'=>1,
            ],

        ];

        Banner::insert($bannerRecords);
    }
}
