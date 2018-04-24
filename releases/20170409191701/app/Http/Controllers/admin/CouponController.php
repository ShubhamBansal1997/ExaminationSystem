<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Coupons;
use App\Admins;
use App\Transaction;
use Session;
use Redirect;
class CouponController extends Controller
{
    public function addcoupon(Request $request)
    {
    	$this->validate($request, [
                'coupon_name' => 'required|unique:coupons',
                'coupon_percent' => 'required|digits_between:0,50',
                'coupon_number' => 'required'
                 ]);
    	$email = Session::get('aemail');
    	$coupon = new Coupons;
        $coupon_name = strtoupper($request->input('coupon_name'));
    	$coupon->coupon_name = $coupon_name;
    	$coupon->coupon_percent = $request->input('coupon_percent');
    	$coupon->coupon_number = $request->input('coupon_number');
    	$coupon->admin_email = $email;
    	$coupon->coupon_active = TRUE;
    	$coupon->save();
        return Redirect::back();
    }
    public function deletecoupon($couponid)
    {
    	$coupon = Coupons::where('id',$couponid)->first();
    	$coupon->coupon_active = FALSE;
        $coupon->save();
    	return Redirect::back();
    }
    public function payoutinitiate()
    {
        $email = Session::get('aemail');
        $admin = Admins::where('email',$email)->first();
        $amt = $admin->amount;
        if($amt!=0)
        {
            $admin->amount = 0;
            $admin->save();
            $tr = new Transaction;
            $today = date("Ymd");
            $rand = strtoupper(substr(uniqid(sha1(time())),0,4));
            $tr_id = $today . $rand;
            $tr->tr_id = $tr_id;
            $tr->admin_email = $email;
            $tr->amount = $amt;
            $tr->method = "default";
            $tr->initiate = FALSE;
            $tr->save();
        }
        return Redirect::back();
    }
}
