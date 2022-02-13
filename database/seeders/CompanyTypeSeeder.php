<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;

class CompanyTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        
        DB::table('company_types')->insert([
            'name' => 'โรงแรม',
            'name_en' => 'Hotel',
            'desc' => 'โรงแรม',
            'image' => null,
            'status' => 'Active',
        ]);

        DB::table('company_types')->insert([
            'name' => 'เกสเฮ้าส์',
            'name_en' => 'Guest House',
            'desc' => 'เกสเฮ้าส์',
            'image' => null,
            'status' => 'Active',
        ]);

        DB::table('company_types')->insert([
            'name' => 'เซอร์วิสอพาร์ทเม้นท์',
            'name_en' => 'Service Apartment',
            'desc' => 'เซอร์วิสอพาร์ทเม้นท์',
            'image' => null,
            'status' => 'Active',
        ]);
    }
}
