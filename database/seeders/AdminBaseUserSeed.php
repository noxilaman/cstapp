<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\Group;

class AdminBaseUserSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $groupid = Group::where('name','admin')->first()->id;

        DB::table('users')->insert([
            'name' => 'Admin', 
            'username' => 'admin',
            'email' => 'admin@childsafetourism.com',
            'email_verified_at' => date("Y-m-d H:i:s"),
            'password' => Hash::make('P@ssw0rd'),
            'group_id' => $groupid
        ]);
    }
}
