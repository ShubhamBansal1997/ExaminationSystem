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
    		return redirect('admin.home');
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
            $password = bcrypt($password);
            //dd($password);
            $query = Admins::where('email',$email)->where('password',$password)->where('a_status','1');  
            if($query->count())
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
    public function upload_image(ImageRequest $request)
	{
	    if($request->hasFile('image')){
	        $filename = str_random(20).'_'.$request->file('image')->getClientOriginalName();
	        $image_path = base_path() . '/public/images/thread/';
	        $request->file('image')->move(
	            $image_path, $filename
	        );
	        echo $filename;    
	    }
	    else{
	        echo 'Oh No! Uploading your image has failed.';
	    }
	}
}
