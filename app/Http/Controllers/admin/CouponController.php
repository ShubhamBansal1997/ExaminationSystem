<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Coupons;
use Session;
use Redirect;
class CouponController extends Controller
{
    public function addcoupon(Request $request)
    {
    	$this->validate($request, [
                'coupon_name' => 'required|unique:coupons',
                'coupon_percent' => 'required|digits_between:0,50'
                'coupon_number' => 'required|digits'
                 ]);
    	$email = Session::get('aemail');
    	$coupon = new Coupons;
    	$coupon->coupon_name = $request->input('coupon_name');
    	$coupon->coupon_percent = $request->input('coupon_percent');
    	$coupon->coupon_number = $request->input('coupon_number');
    	$coupon->coupon_email = $email;
    	$coupon->coupon_active = TRUE;
    	$coupon->save();
    }
    public function deletecoupon($couponid)
    {
    	$coupon = Coupons::where('id',$couponid)->first();
    	$coupon->coupon_active = FALSE;
    	return Redirect::back();
    }
}
