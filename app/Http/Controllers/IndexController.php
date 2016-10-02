<?php

namespace App\Http\Controllers;

use Session;
use Illuminate\Http\Request;
use App\Users;
use App\Http\Requests;

class IndexController extends Controller
{
    public function index()
    {
    		return view('pages.index');
    }


    public function login()
    {
    	$login_status = Session::get('Login_status');
    	if($login_status==true)
    	{
    		return redirect('home');
    	}
    	else
    	{
    		return view('login');
	    }
    }

    public function postLogin(Request $request)
    {
        if(Session::get('Login_status')==TRUE)
            return redirect('home');
        else
        {
              $this->validate($request, [
                'mobile' => 'required|min:10|max:10'
                 ]);
        
        
            $mobile = $request->mobile;
            $query = Users::where('mobile',$mobile);  
            if($query->count())
            {
                $query= $query->get();
                foreach($query as $data)
                {
                    $email = $data->email;
                }
                Session::set('Login_status',TRUE);
                Session::set('email',$email);
                return redirect('home');
            }
            else
            {
                Session::flash('flash_message', 'Your Phone No is not registered');
                return view('login');
            }
       
            
            

                    
        }   
    }

    public function register()
    {
    	if(Session::get('Login_status')==TRUE)
    		return redirect('home');
    	else
    		return view('register');

    }
    public function postRegister(Request $request)
    {
		if(Session::get('Login_status')==TRUE)
    		return redirect('home');
    	else
    	{
    		  $this->validate($request, [
                'name' => 'required',
                'email' => 'required|email|max:75|unique:users',
                'mobile' => 'required|min:10|max:10|unique:users'
                 ]);
        
        
        
            /*if ($validator->fails())
            {
                return redirect()->back()->withErrors($validator->messages());
            }*/ 
          
       
            $user = new Users;

            
            $user->name = $request->name; 
            $user->email = $request->email;       
            $user->mobile = $request->mobile;      
             
            $user->save();
            Session::flash('flash_message', 'You have been successfully registered');
            return view('register');

        	    	
        }
    }
    public function logout()
    {
        Session::flush();
        Session::flash('flash_message', 'You have been successfully Logout');
        return redirect('login');
    }
    
}
