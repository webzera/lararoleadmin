<?php

use Illuminate\Database\Seeder;
use Webzera\Lararoleadmin\AdminRole;

class AdminRoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$admin_role= new AdminRole();
        $admin_role->admin_id=1;
        $admin_role->role_id=1;
        $admin_role->save();
    }
}
