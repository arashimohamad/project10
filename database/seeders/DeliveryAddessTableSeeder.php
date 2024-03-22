<?php

namespace Database\Seeders;

use App\Models\DeliveryAddress;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DeliveryAddessTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $deliveryAddressRecords =[
            ['id'=>1, 'user_id'=>1, 'name'=>'Ismail Bin Taib', 'address'=>'Lot 270 Lrg Haji Yaacob Kg Tok Buak, Simpang Empat Tendong', 
            'city'=>'Pasir Mas', 'state'=>'Kelantan', 'country'=>'Malaysia', 'postcode'=>'17030', 'mobile'=>'013-9235690', 'status'=>1],  
            ['id'=>2, 'user_id'=>1, 'name'=>'Muhammad Fathmi Bin Masor @ Mansor', 'address'=>'Lot 506, Lorong Mussala, Kg. Pulau Belanga, Sering', 
            'city'=>'Kota Bharu', 'state'=>'Kelantan', 'country'=>'Malaysia', 'postcode'=>'16150', 'mobile'=>'014-8253134', 'status'=>1], 
        ];

        DeliveryAddress::insert($deliveryAddressRecords);
    }
}
