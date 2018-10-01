<?php

namespace App\Http\Controllers\content;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


use App\Http\Requests;

use Session;
use App\Admins;
use App\Content;

class IndexControllerc extends Controller
{
    public function login()
    {

      if(Session::get('c_status')==TRUE)
        return view('content.home');
      else
        return view("content.login");
    }
    public function postLoginc(Request $request)
    {
      if(Session::get('c_status')==TRUE)
            return redirect('content/home');
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
            $query = Content::where('email',$email)->where('password',$password)->where('status','1')->where('delete','0')->first();
            //dd($query);
            if($query!=null){
                //var_dump("asdasda");
                Session::set('c_status',TRUE);
                Session::set('cemail',$query->email);
               return redirect('content/home');
            }
            else
            {
                Session::flash('flash_message', 'Your Email or password is incorrect');
                return view('content.login');
            }
        }
    }
    public function logout()
    {
        Session::flush();
        Session::flash('flash_message', 'You have been successfully Logout');
        return redirect('content');

    }
    public function home()
    {
         if(Session::get('c_status')==TRUE)
         {
      $user = Content::where('email', Session::get('cemail'))->first();
    return view('content.profile', compact('user'));
}return view('content.login');

    }
   

    public function guidanceSession()
    {
      $user = Content::where('email', Session::get('eemail'))->first();
    return view('content.guidance', compact('user'));

    }
     public function changePWD(Request $request)
    {
        $pwd=md5($request->oldpwd);
     
      $user = Content::where('email', Session::get('cemail'))->where('password',$pwd)->where('status','1')->where('delete','0')->first();
  
   if($user!=null){

        $user->password=md5($request->newpwd);
         $user->save();
         return redirect('content/logout');
    }

    }
 public function writecontent()
 {
   $user = Content::where('email', Session::get('cemail'))->first();
 return view('content.writeContent', compact('user'));
 }
    



}
