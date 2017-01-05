<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Softon\Indipay\Facades\Indipay;
use App\Coupons;
use App\Coupon_Activity;
use App\Transaction;
class UserController extends Controller
{
    public function applycoupon($coupon_name,$price)
    {
        $coupon = Coupons::where('coupon_name',$coupon_name)
                        ->where('coupon_active',TRUE)
                        ->first();
        if($coupon->coupon_number)
        {
            $coupon->coupon_number = $coupon->coupon_number -1;
            $price = ($price * $coupon->coupon_percent) /100;
            Session::set('coupon_name',$coupon_name);
            Session::set('coupon_active',TRUE);
            return view('pages.price'); //someparamters needs to be passed also
        }
        return Redirect::back();
    }
    public function payment($price,$package)
    {
    	$today = date("Ymd");
        $rand = strtoupper(substr(uniqid(sha1(time())),0,4));
        $tr_id = $today . $rand;
        // we should session the parameterrs according to our need 
        $parameters = [

    	'key' => 'gtKFFx',
        'txnid' => '1233221223322',
        'surl' => 'http://localhost:8000/indipay/response',
        'furl' => 'http://localhost:8000/indipay/response',
        'firstname' => 'shubham',
        'email' => 'shubhambansal17@hotmail.com',
        'phone' => '9810075578',
        'productinfo' => 'listing',
        'service_provider' => 'bp',
        'amount' => $price,
        'udf1' => Session::get('coupon_name');

      ];

      $order = Indipay::prepare($parameters);
      return Indipay::process($order);
    }
   	public function response(Request $request)
    
    {
        // For default Gateway
        $response = Indipay::response($request);
        
        // For Otherthan Default Gateway
        $response = Indipay::gateway('payumoney')->response($request);

        $response["udf1"] = 
        dd($response);
    
    }  
}
