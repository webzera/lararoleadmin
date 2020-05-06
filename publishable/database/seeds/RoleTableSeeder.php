<?php

use Illuminate\Database\Seeder;
use Webzera\Lararoleadmin\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$role_admin= new Role();
        $role_admin->name='Admin';
        $role_admin->description='A School Admin';
        $role_admin->save();        

        $role_staff= new Role();
        $role_staff->name='Staff';
        $role_staff->description='A School staff';
        $role_staff->save();

        $role_user= new Role();
        $role_user->name='User';
        $role_user->description='A normal user';
        $role_user->save();

       
    }
}
