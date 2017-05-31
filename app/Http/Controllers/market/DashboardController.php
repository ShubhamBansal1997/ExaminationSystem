<?php

namespace App\Http\Controllers\market;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Session;
use App\Admins;
use App\Market;
use App\Coupons;
use App\Coupon_Activity;

class DashboardController extends Controller
{
  public function index()
  {
    if(Session::get('m_status')==TRUE)
    {
      return view('market.home');
    }
  }

  /** function to list coupons */
  public function coupons()
  {
    $coupons = Coupons::where('admin_email',Session::get('memail'))->where('coupon_delete',false)->get();
    $user = Market::where('email',Session::get('memail'))->first();
    //dd($user);
    return view('market.coupons',compact('coupons','user'));
  }

  /** function to add coupons to database */
  public function addcoupon(Request $request)
  {
    $this->validate($request, [
        'id' => 'required',
        'method' => 'required',
        'coupon_name' => 'required|unique:coupons',
        'coupon_discount' => 'required|digits',
        'coupon_number' => 'required|digits',
      ]);
      $user = Market::where('id',$request->id)->first();
      if($request->coupon_discount>$user->max_discount)
      {
        $msg = array(
          'status' => 'failure',
          'message'=> 'try to enter invalid input details'
           );
        return response()->json($msg, 400);
      }
      else
      {
        $coupons = new Coupons;
        $coupon->coupon_name = $request->coupon_name;
        $coupon->coupon_percent = $request->coupon_discount;
        $coupon->coupon_number = $request->coupon_number;
        $coupon->coupon_active = true;
        $coupon->admin_email = $user->email;
        $coupon->save();
        $msg = array(
          'status' => 'success',
          'message' => 'new coupon added successfully' );
        return response()->json($msg, 200);
      }


  }

  /** function  to change the status of the coupon*/
  public function couponstatus($id)
  {
    $coupon = Coupons::where('id',$id)->first();
    if($coupon->coupon_status==false){
      $coupon->coupon_status=true;
    }else{
      $coupon->coupon_status=false;
    }
    $msg = array(
      'status' => 'success',
      'message' => 'Coupon Status Changed' );
    return response()->json($msg, 200);
  }

  /** function to delete coupon */
  public function deletecoupon()
  {
    $coupon = Coupons::where('id',$id)->first();
    $coupon->coupon_delete = true;
    $coupon->coupon_active = false;
    $coupon->save();
    $msg = array(
      'status' => 'sucess',
      'message' 'Coupon deleted successfully' );
    return response()->json($msg, 200);
  }

  /** function to disply coupon conversion */
  public function couponconversion()
  {

  }

  /** function to display the payouts */
  public function payouts()
  {

  }




}
