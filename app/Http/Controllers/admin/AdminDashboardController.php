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
    		return view('admin.home');
    	else
    		return redirect('login');
    }
}
