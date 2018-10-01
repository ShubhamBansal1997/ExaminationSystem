<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use Session;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class AdminDashboardController extends Controller
{
    public function index()
    {
    	if(Session::get('admin_status')==TRUE)
    		return view('admin.pages.home');
    	else
    		return redirect('login');
    }
    public function u_list()
    {
    	return view('admin.pages.u_list');
    }
}
