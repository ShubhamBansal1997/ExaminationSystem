<?php

namespace App\Http\Controllers\market;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


use App\Http\Requests;

use Session;
use App\Admins;
use App\Market;

class IndexController extends Controller
{
    public function index()
    {
      if(Session::get('market_status')==TRUE)
        return redirect('market/home');
      else
        return view("market.login");
    }
    public function postLogin(Request $request)
    {
      if(Session::get('market_status')==TRUE)
            return redirect('market/home');
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
            $query = Market::where('email',$email)->where('password',$password)->where('a_status','1');
            if($query->count()>=1)
            {
                $query= $query->get();
                foreach($query as $data)
                {
                    $email = $data->email;
                    $a_status = $data->a_status;
                }
                Session::set('market_status',TRUE);
                Session::set('memail',$email);
                Session::set('m_status',$a_status);
                return redirect('admin/login');
            }
            else
            {
                Session::flash('flash_message', 'Your Email or password is incorrect');
                return view('market.login');
            }





        }
    }
    public function logout()
    {
        Session::flush();
        Session::flash('flash_message', 'You have been successfully Logout');
        return redirect('market/login');
    }

}
