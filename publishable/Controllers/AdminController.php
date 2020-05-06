<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
        // $this->middleware('checkrole');
    }
    public function index()
	{
		return view('admin::home');		
	}
}
