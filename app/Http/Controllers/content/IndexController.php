<?php

namespace App\Http\Controllers\content;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function index()
    {
      if(Session::get('content_status')==TRUE)
        return redirect('content/home');
      else
        return view("admin.index");
    }
    public function postLogin(Request $request)
    {
      if(Session::get('content_status')==TRUE)
            return redirect('content');
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
            $query = Content::where('email',$email)->where('password',$password);
            if($query->count()>=1)
            {
                $query= $query->get();
                foreach($query as $data)
                {
                    $email = $data->email;
                    $a_status = $data->a_status;
                }
                Session::set('content_status',TRUE);
                Session::set('cemail',$email);
                Session::set('c_status',$a_status);
                return redirect('content');
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
        return redirect('content');
    }
}
