<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests;

class IndexController extends Controller
{
    public function index()
    {
    	if(Session::get('Login_status')==TRUE)
    		return view('pages.index');
    	else
    		return view('pages.login');
    }


    public function login(Request $request)
    {
    	$login_status = Session::get('Login_status');
    	if($login_status==TRUE)
    	{
    		redirect ('home');
    	}
    	else
    	{
    		$this->validate($request, [
            'email' => 'required|email', 'password' => 'required',
        ]);
    		$var = User::where('email',$request->email)
    			->where('password',bcrypt($request->password))
    			->count();
    		if($var)
    		{
	    		Session::set('email', $request->email);
	    		Session::set('Login_status', true);
	    		redirect ('pages.home');
	    	}
	    	else
	    	{

	    	}

    	}
    }

    public function register()
    {
    	if(Session::get('Login_status')==TRUE)
    		return view('pages.home');
    	else
    		return view('pages.register');

    }
    public function postRegister(Request $request)
    {
		if(Session::get('Login_status')==TRUE)
    		return view('pages.home');
    	else
    	{
    		//register code will come here;

    	}    	
    }

}
