<?php

namespace Webzera\Lararoleadmin\Http\Controllers;

use App\Http\Controllers\controller;
// use Illuminate\Support\Facades\Auth;

class LaradminController extends Controller
{
	public function __construct()
    {
    	// if(auth("admin"))
     //    { 
     //    	dd('cons');
    	// }
    	// else
    	// {
    	// 	dd('no');
    	// }

    	
        $this->middleware('auth:admin');
        $this->middleware('checkrole');
    }
	public function index()
	{
		return view('admin::home');		
	}

	public function test()
	{
		return 'This is test admin package page from controller';
	}
}