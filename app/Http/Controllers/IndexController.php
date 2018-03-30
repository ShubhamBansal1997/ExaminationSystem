<?php

namespace App\Http\Controllers;

use Session;
use Illuminate\Http\Request;
use App\Users;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use App\Expert;
use App\Expert_descrption;
use App\Coupons;
use App\ExpertBooking;
use Instamojo\Instamojo;

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
      $experts = Expert::all();
      return view('allexperts', compact('experts'));
    }

    public function neet()
    {
      return view('pages.neet');
    }

    public function jipmer() {
      return view('pages.jipmer');
    }

    public function aiims() {
      return view('pages.aiims');
    }

    public function eamcet() {
      return view('pages.eacmet');
    }
    public function bookexpert($name, $pk) {
      $expert = Expert::where('id', $pk)->first();
      return view('singleexpert', compact('expert', 'expert_descrption', 'expert_slots'));
    }
    /**
     * Used to validate the Promo code and return the promo code details
     * @param  [type] $code [description]
     * @return [type]       [description]
     */
    public function checkPromoCode($code) {
      $promo = Coupons::where('coupon_name', $code)->where('coupon_active','1')->where('coupon_delete', '0')->firstOrFail();
      return response()->json($promo);

    }
    /**
     * used to add booking from the frontend
     * @param Request $request [description]
     */
    public function addBooking(Request $request) {
      $this->validate($request, [
        'expert_id' => 'required',
        'date' => 'required',
        'time' => 'required',
        'name' => 'required',
        'email' => 'required',
        'phone' => 'required'
      ]);
      $booking = new ExpertBooking;
      $booking->expert_id = $request->expert_id;
      $expert = Expert::where('id', $request->expert_id)->first();
      $booking->booking_expert_name = $expert->first_name;
      //dd("test");
      $booking->booking_date = $request->date;
      $booking->booking_time = $request->time;
      $booking->booking_charges = $expert->amount_to_be_paid;
      $booking->booking_promo_off = 0;
      if($request->booking_promo_code!=null){
        $coupon = Coupons::where('coupon_name', $request->booking_promo_code)->where('coupon_active', '1')->where('coupon_delete', '0')->where('coupon_number','>',0)->first();
        if($coupon!=null) {
          //dd($coupon);
          $booking->booking_promo_code = $coupon->coupon_name;
          $booking->booking_promo_off = $coupon->coupon_percent;
          $booking->booking_charges = ((100 - $coupon->coupon_percent)/100 * $expert->amount_to_be_paid);
;        }
      }
      $booking->booking_expert_charges = $expert->amount_to_be_paid;
      $booking->booking_user_name = $request->name;
      $booking->booking_user_email = $request->email;
      $booking->booking_user_phone = $request->phone;
      $booking->save();
      $response = $this->payment($booking);
      $booking->booking_payment_gateway_id = $response['id'];
      $booking->save();
      return response()->json($response);


    }
    /**
     * function used for the payment of particular booking
     * @param  [type] $booking [description]
     * @return [type]          [description]
     */
    function payment($booking) {
      $api = new Instamojo('e59691ba3b8a310fd87596a1a26e81cb', 'abb022a56203e22ca5d9413fb31a292d');
      try {
      $response = $api->paymentRequestCreate(array(
          "buyer_name" => $booking->booking_user_name,
          "email" => $booking->booking_user_email,
          "phone" => substr($booking->booking_user_phone, -10),
          "purpose" => "Expert Guidance Session",
          "amount" => $booking->booking_charges,
          "send_email" => true,
          "send_sms" => true,
          "email" => $booking->booking_user_email,
          "redirect_url" => "http://127.0.0.1:8000/handle_redirect",
          "allow_repeated_payments" => false
          ));
          return $response;
      }
      catch (Exception $e) {
          print('Error: ' . $e->getMessage());
      }

    }

    function payment_redirect(Request $request) {
      $api = new Instamojo('e59691ba3b8a310fd87596a1a26e81cb', 'abb022a56203e22ca5d9413fb31a292d');
      try {
        $response = $api->paymentRequestPaymentStatus($request->payment_request_id, $request->payment_id);
        dd($response);
    //print_r($response['purpose']);  // print purpose of payment request
    //print_r($response['payment']['status']);  // print status of payment
      }
      catch (Exception $e) {
          print('Error: ' . $e->getMessage());
      }
    }


}

