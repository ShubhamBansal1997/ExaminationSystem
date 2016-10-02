<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Http\Requests;
use App\Chapters;

class UserDashboardController extends Controller
{
   	public function home()
   	{
   		if(Session::get('Login_status')==TRUE)
            return view('pages.home');
         else
            return redirect('login');
   	}
   	public function chap_name($sub_id,$std)
   	{
   		if(Session::get('Login_status')==true)
   		{
   			$check = Chapters::where('sub_id',$sub_id)->where('std',$std)->count();
   			if($check)
	   			return view('pages.chap_name',compact('sub_id','std'));
	   		else
	   			return view('errors.503');
   		}
   		else
   		{
   			return redirect('login');
   		}
   	}
   	public function chap_page($sub_id,$std,$chap_id)
   	{
   		$check = Chapters::where('sub_id',$sub_id)
   						->where('std',$std)
   						->where('chap_id',$chap_id)
   						->count();
   		if($check)
   			return view('pages.chap_details',compact('sub_id','class','chap_id'));
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
