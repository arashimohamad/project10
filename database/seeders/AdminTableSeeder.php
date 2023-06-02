<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $password = Hash::make('123456');
        $adminRecords = [
            // ['id'=> 1,'name'=>'Eric','type'=>'admin','mobile'=>'0133311920',
            // 'email'=>'admin@admin.com','password'=>$password,'image'=>NULL,'status'=>1,'created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")],
            // ['id'=> 2,'name'=>'Lisa','type'=>'subadmin','mobile'=>'0111111111',
            // 'email'=>'lisa@admin.com','password'=>$password,'image'=>NULL,'status'=>1,'created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")],
            // ['id'=> 3,'name'=>'John','type'=>'subadmin','mobile'=>'0111111112',
            // 'email'=>'john@admin.com','password'=>$password,'image'=>NULL,'status'=>1,'created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")],
            
            // ['id'=> 4,'name'=>'Admin3','type'=>'admin','mobile'=>'0131111113',
            // 'email'=>'admin3@admin.com','password'=>$password,'image'=>NULL,'status'=>1,'created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")],
            // ['id'=> 5,'name'=>'Admin4','type'=>'admin','mobile'=>'0141111114',
            // 'email'=>'admin4@admin.com','password'=>$password,'image'=>NULL,'status'=>1,'created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")],
        ];

        Admin::insert($adminRecords);
    }
}
