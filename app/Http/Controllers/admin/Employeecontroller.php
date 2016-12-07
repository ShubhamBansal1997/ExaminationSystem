<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Admins
use App\Http\Requests;
use App\Http\Controllers\Controller;

class Employeecontroller extends Controller
{
    public function list_content()
    {
    	$test = 2;
    	return view('admin.pages.e_list',compact('test'));
    }
    public function list_market()
    {
    	$test = 3;
    	return view('admin.pages.e_list',compact('test'));
    }
}
