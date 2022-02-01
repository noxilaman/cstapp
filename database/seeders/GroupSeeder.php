<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('groups')->insert([
            'name' => 'admin',
            'desc' => 'Admin Group',
            'status' => 'Active',
        ]);

        DB::table('groups')->insert([
            'name' => 'company',
            'desc' => 'Company Group',
            'status' => 'Active',
        ]);

        DB::table('groups')->insert([
            'name' => 'student',
            'desc' => 'Student Group',
            'status' => 'Active',
        ]);
    }
}
