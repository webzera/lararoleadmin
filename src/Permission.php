<?php

namespace Webzera\Lararoleadmin;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
	public function roles()
    {
        return $this->belongsToMany('Webzera\Lararoleadmin\Role', 'permission_roles', 'permission_id', 'role_id');
    }
    //John - albert
    public function hasPermissionThisRole($permission, $role){
    	$checkrolepermission=PermissionRole::where([
    		'role_id' => $role,
    		'permission_id' => $permission,
    	])->first();
    	return $checkrolepermission;
    }
}
