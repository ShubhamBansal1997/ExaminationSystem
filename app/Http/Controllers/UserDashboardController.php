<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Chapters;

class UserDashboardController extends Controller
{
   	public function home()
   	{
   		return view('home');
   	}
   	public function chap_name($sub_name,$class)
   	{
   		if(Session::get('Login_status')==true)
   		{
   			$check = Chapters::where('sub_name',$sub_name)->count();
   			if($check&&(class=='11'||class=='12'))
	   			return view('pages.chap_name',compact('sub_name','class'));
	   		else
	   			return view('errors.503');
   		}
   		else
   		{
   			redirect ('login');
   		}
   	}
   	public function chap_page($sub_name,$class,$chap_name)
   	{
   		$check = Chapters::where('sub_name',$sub_name)
   						->where('class',$class)
   						->where('chap_name_slug',$chap_name)
   						->count();
   		if($check)
   			return view('chap_details',compact('sub_name','class','chap_name'));
   		else
   			return view('errors.503');
   	}
   	public function askadoubt()
   	{
   		if(Session::get('Login_status')==true)
   		{
   			return view('pages.ask_a_doubt');
   			// ask a doubt feature needs to be made here
   		}
   	}

}
