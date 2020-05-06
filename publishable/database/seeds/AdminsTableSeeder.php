<?php

use Illuminate\Database\Seeder;

// use Webzera\Laradmin\Admin;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {       
        DB::table('admins')->insert([
            'name' => "admin",
            'email' => 'webzera@webzera.com',
            'address' => '24, Biruntha nagar',
            'city' => 'Mannargudi',
            'pincode' => '614001',
            'mobile_no' => '9566532239',
            'password' => bcrypt('password'),            
        ]);
    }
}
