<?php

namespace Webzera\Lararoleadmin\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Webzera\Lararoleadmin\Admin;
use Webzera\Lararoleadmin\Role;

class RoleController extends Controller
{
	/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->middleware('checkrole');
    }
    public function adminrolelist()
    {        
         $userdetails=Admin::orderBy('created_at', 'asc')->paginate(10);
        return view('admin::rolebase.adminrolelist')->with('userdetails', $userdetails);
    }
    public function createroleform(){
         return view('admin.rolebase.create');
    }
    public function createrolestore(Request $request){
        
        $this->validate($request, [
          'name'=> 'required',
          'description'=> 'required',
          ]);
        $role = new Role;
        $role->name=$request->input('name');
        $role->description=$request->input('description');
        $role->save();

       flash('New Admin Role Created Successfully');
       return redirect('/admin/adminrolelist');

    }
    public function roleassign(Request $request)
    {
        $admin = Admin::where('email', $request['email'])->first();
        $admin->roles()->detach();

        $rolename=$request[$request['radiovalue']]; //radio only
        $admin->roles()->attach(Role::where('name', $rolename)->first());        

        // $roles=\App\Role::all();                //checkbox
        // foreach ($roles as $role) {
        //     if($request[$role->name]){
        //         $admin->roles()->attach(Role::where('name', $role->name)->first());
        //     }
        // }
        flash('Admin Role Updated Successfully');
        return redirect()->back();
    }
}
