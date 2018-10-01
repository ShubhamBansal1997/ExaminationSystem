<?php

namespace App\Http\Controllers\expert;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


use App\Http\Requests;

use Session;
use App\Admins;
use App\Expert;

class IndexController extends Controller
{
    public function login()
    {

      if(Session::get('expert_status')==TRUE)
        return view('expert.home');
      else
        return view("expert.login");
    }
    public function postLogin(Request $request)
    {
      if(Session::get('market_status')==TRUE)
            return redirect('expert/home');
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
            $query = Expert::where('email',$email)->where('password',$password)->where('status','1')->first();
            //dd($query);
            if($query!=null){
                //var_dump("asdasda");
                Session::set('m_status',TRUE);
                Session::set('eemail',$query->email);
                return redirect('expert/home');
            }
            else
            {
                Session::flash('flash_message', 'Your Email or password is incorrect');
                return view('expert.login');
            }
        }
    }
    public function logout()
    {
        Session::flush();
        Session::flash('flash_message', 'You have been successfully Logout');
        return redirect('expert');
    }
    public function home()
    {
      $user = Expert::where('email', Session::get('eemail'))->first();
    return view('expert.profile', compact('user'));

    }

    public function guidanceSession()
    {
      $user = Expert::where('email', Session::get('eemail'))->first();
    return view('expert.guidance', compact('user'));

    }
       public function changePWD(Request $request)
    {
    
  $pwd=md5($request->oldpwd);
     
      $user = Expert::where('email', Session::get('eemail'))->where('password',$pwd)->where('status','1')->first();
  
   if($user!=null){

        $user->password=md5($request->newpwd);
         $user->save();
     }
      return redirect('expert/logout');
       
    }



}
