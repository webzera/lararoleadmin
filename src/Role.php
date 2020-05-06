<?php

namespace Webzera\Lararoleadmin;

use Illuminate\Database\Eloquent\Model;
use Webzera\Lararoleadmin\Permission;

class Role extends Model
{
    public function admins(){
    	return $this->belongsToMany('Webzera\Lararoleadmin\Admin', 'user_role', 'role_id', 'admin_id');
    }
    public function permissions(){
    	return $this->belongsToMany('Webzera\Lararoleadmin\Permission', 'permission_roles', 'role_id', 'permission_id');
    }
}
