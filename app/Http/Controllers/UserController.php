<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Softon\Indipay\Facades\Indipay;

class UserController extends Controller
{
    public function testing()
    {
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
            'amount' => '122.00',

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

        dd($response);
    
    }  
}
