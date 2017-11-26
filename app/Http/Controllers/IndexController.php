<?php

namespace App\Http\Controllers;

use Session;
use Illuminate\Http\Request;
use App\Users;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use App\Expert;

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
    		return view('pages.login');
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


            $phone = $request->mobile;
            $query = Users::where('mobile',$phone);
            $query= $query->first();           //comment the code and uncomment the if lines
            $email = $query->email;            //comment the code and uncomment the if lines
            Session::set('email',$email);      //comment the code and uncomment the if lines
            Session::set('Login_status',TRUE); //comment the code and uncomment the if lines
            return redirect('home');           //comment the code and uncomment the if lines
            /*if($query->count())
            {
                $query= $query->first();
                $email = $query->email;
                Session::set('email',$email);
                $baseUrl = "https://sendotp.msg91.com/api";
                $cc = +91;
                $data = array("countryCode" => $cc, "mobileNumber" => $phone,"getGeneratedOTP" => true);
                $data_string = json_encode($data);
                $ch = curl_init($baseUrl.'/generateOTP');
                curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
                curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_AUTOREFERER, true);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
                curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                      'Content-Type: application/json',
                      'Content-Length: ' . strlen($data_string),
                      'application-Key: JTEZ7KpKkxYqQdpMlujrjFaVojcxl5C7UqmCbvp8g80OO9aDlUlSeR4i7W5o1zjZo0GMhA6np5JNaka4jVYip5iUJEqAnf8fhII056m1hcuVPvE6IPiemhKl6q44dmTrHbvb8CFKmB_GVfARu5h8VQ==',
                  ));
                $result = curl_exec($ch);
                curl_close($ch);
                $response=json_decode($result);
                //dd($response->status);
                if($response->status=="success")
                {
                  $otp = $response->response->oneTimePassword;
                  //dd($otp);
                  Session::set('otp',$otp);
                  return view('pages.verifyotp',compact('phone'));
                }
                else
                {
                  return Redirect::back();
                }
            }
            else
            {
                return Redirect::back();
            }*/
        }
    }

    public function register()
    {
    	if(Session::get('Login_status')==TRUE)
    		return Redirect::back();
    	else
    		return view('pages.register');

    }
    public function postRegister(Request $request)
    {
		if(Session::get('Login_status')==TRUE)
    		return redirect('pages.home');
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
            $phone = $request->mobile;
            $email = $request->email;
            Session::set('email',$email);
            $baseUrl = "https://sendotp.msg91.com/api";
            $cc = +91;
            $data = array("countryCode" => $cc, "mobileNumber" => $phone,"getGeneratedOTP" => true);

            $data_string = json_encode($data);
            $ch = curl_init($baseUrl.'/generateOTP');
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_AUTOREFERER, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                  'Content-Type: application/json',
                  'Content-Length: ' . strlen($data_string),
                  'application-Key: JTEZ7KpKkxYqQdpMlujrjFaVojcxl5C7UqmCbvp8g80OO9aDlUlSeR4i7W5o1zjZo0GMhA6np5JNaka4jVYip5iUJEqAnf8fhII056m1hcuVPvE6IPiemhKl6q44dmTrHbvb8CFKmB_GVfARu5h8VQ==',
              ));
              $result = curl_exec($ch);
              curl_close($ch);
              $response=json_decode($result);
              //dd($response->status);
              if($response->status=="success")
              {
                $otp = $response->response->oneTimePassword;
                //dd($otp);
                Session::set('otp',$otp);
                return view('pages.verifyotp',compact('phone'));
              }
              else
              {
                return Redirect::back();
              }
        }
    }
    public function verifyotp(Request $request)
    {

            $this->validate($request, [
                'otp' => 'required',
                ]);
            $email = Session::get('email');
            $otp = $request->input('otp');
            if(Session::get('otp')==$otp)
            {
                Session::forget('otp');
                $user = Users::where('email',$email)->first();
                $user->status = TRUE;
                Session::set('Login_status',TRUE);
                return redirect('home');
            }
            else
                return Redirect::back();
    }
    public function logout()
    {
        Session::flush();
        Session::flash('flash_message', 'You have been successfully Logout');
        return redirect('pages.login');
    }

    public function allexperts()
    {
      $expert = Expert::all();
      return view('allexperts', compact('expert'));
    }
}
