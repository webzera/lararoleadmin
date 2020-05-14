<?php

namespace Webzera\Lararoleadmin\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Webzera\Lararoleadmin\Admin;
use Webzera\Lararoleadmin\Role;

use Illuminate\Support\Str;

class AdminuserController extends Controller
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
    public function create(){
        return view('admin.adminuser.create');
    }
    public function index()
    {        
        $userdetails=Admin::orderBy('created_at', 'asc')->paginate(10);
        return view('admin.adminuser.adminlist')->with('userdetails', $userdetails);
    }
    public function store(Request $request){
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:admins'],
            'password' => ['required', 'string', 'min:6'],
            'date_join' => 'required',
            'address' => 'required',
            'city' => 'required',
            'pincode' => 'required',
            'mobile_no' => 'required',
        ]);

        $admin= new Admin;
        if ($request->profile_image) {
            $image = $request->file('profile_image');
            $slug = Str::of($request->name)->slug('-');
            $name = uniqid().'-'.$slug.'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/storage/adminuser');
            // $destinationPath = '/home/megha/public_html/storage/adminuser';
            $imagePath = $destinationPath. "/".  $name;
            if(!$image->move($destinationPath, $name))
            {
              echo "file not upload"; die();
            }
            $admin->profile_image = $name;
        }
        $admin->name=$request->input('name');
        $admin->email=$request->input('email');
        $admin->password=Hash::make($request->input('password'));
        $admin->date_join=$request->input('date_join');
        $admin->address=$request->input('address');
        $admin->city=$request->input('city');
        $admin->pincode=$request->input('pincode');
        $admin->mobile_no=$request->input('mobile_no');
        $admin->save();

        $role_staff=Role::where('name', 'Staff')->first();
        $admin->roles()->attach($role_staff);

        flash('New Admin User Created Successfully!');
        return redirect('/admin/adminlist');
    }
    public function edit($id)
    {
      $admin = Admin::findOrFail($id);
      return view('admin.adminuser.edit')->with('admin', $admin);
    }
    public function update(Request $request, $id)
    {

        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],            
            'date_join' => 'required',
            'address' => 'required',
            'city' => 'required',
            'pincode' => 'required',
            'mobile_no' => 'required',
        ]);
        $admin = Admin::findOrFail($id);
        if ($request->profile_image) {
            $image = $request->file('profile_image');
            $slug = Str::of($request->name)->slug('-');
            $name = uniqid().'-'.$slug.'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/storage/adminuser');
            // $destinationPath = '/home/megha/public_html/storage/adminuser';
            $imagePath = $destinationPath. "/".  $name;
            if(!$image->move($destinationPath, $name))
            {
              echo "file not upload"; die();
            }
            $admin->profile_image = $name;
        }
        $admin->name=$request->input('name');
        $admin->email=$request->input('email');
        // $admin->password=Hash::make($request->input('password'));
        $admin->date_join=$request->input('date_join');
        $admin->address=$request->input('address');
        $admin->city=$request->input('city');
        $admin->pincode=$request->input('pincode');
        $admin->mobile_no=$request->input('mobile_no');
        $admin->save();

        // $role_staff=Role::where('name', 'Staff')->first();
        // $admin->roles()->attach($role_staff);

        flash($admin->name.' Admin User Updated Successfully!');
        return redirect('/admin/adminuser');
    }
    
}
