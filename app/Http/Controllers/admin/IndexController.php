<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Session;
use App\Admins;

class IndexController extends Controller
{
    public function index()
    {
    	if(Session::get('admin_status')==TRUE)
    		return redirect('admin/home');
    	else
    		return view("admin.index");
    }
    public function postLogin(Request $request)
    {
	    if(Session::get('admin_status')==TRUE)
            return redirect('admin');
        else
        {
              $this->validate($request, [
                'email' => 'required|email',
                'password' => 'required'
                 ]);
        
        
            $email = $request->email;
            $password = $request->password;
            $password = md5($password);
            //dd($password);
            //dd($password);
            $query = Admins::where('email',$email)->where('password',$password)->where('a_status','1');  
            if($query->count()>=1)
            {
                $query= $query->get();
                foreach($query as $data)
                {
                    $email = $data->email;
                }
                Session::set('admin_status',TRUE);
                Session::set('aemail',$email);
                return redirect('admin');
            }
            else
            {
                Session::flash('flash_message', 'Your Email or password is incorrect');
                return view('admin.index');
            }
       
            
            

                    
        }   
    }
    public function logout()
    {
        Session::flush();
        Session::flash('flash_message', 'You have been successfully Logout');
        return redirect('admin');
    }
    
}
