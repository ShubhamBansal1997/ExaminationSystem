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
        'coupon_name' => 'required|unique:coupons',
        'coupon_percent' => 'required',
        'coupon_number' => 'required',
        'admin_email' => 'required',
        'coupon_type' => 'required'
      ]);
    //dd($request);
        $coupon = new Coupons;
        $coupon->coupon_name = strtoupper($request->coupon_name);
        $coupon->coupon_percent = $request->coupon_percent;
        $coupon->coupon_number = $request->coupon_number;
        $coupon->coupon_active = true;
        $coupon->admin_email = $request->admin_email;
        $coupon->coupon_type = $request->coupon_type;
        $coupon->save();
        $msg = array(
          'status' => 'success',
          'message' => 'new coupon added successfully' );
        return response()->json($msg, 200);
  }

  /** function  to change the status of the coupon*/
  public function couponstatus($id)
  {
    $coupon = Coupons::where('id',$id)->first();

    if($coupon->coupon_active==1){
      $coupon->coupon_active=0;
    }else{
      $coupon->coupon_active=1;
    }
    $coupon->save();
    $msg = array(
      'status' => 'success',
      'message' => 'Coupon Status Changed' );
    return response()->json($msg, 200);
  }

  /** function to delete coupon */
  public function deletecoupon($id)
  {
    $coupon = Coupons::where('id',$id)->first();
    $coupon->coupon_delete = true;
    $coupon->coupon_active = false;
    $coupon->save();
    $msg = array(
      'status' => 'sucess',
      'message' => 'Coupon deleted successfully' );
    return response()->json($msg, 200);
  }

  /** function to get the details of the marketing user */
  public function getmarketuser($id)
  {
    $user = Market::where('id',$id)->first();
    if($user==null){
      $msg = array(
        'status' => 'success',
        'message' => 'Market user does not exist' );
      return response()->json($msg, 404);
    }
    else {
      $user->toArray();
      return response()->json($user, 200);
    }
  }

  /** function to update the details of the marketing user */
  public function updatemarketuser(Request $request)
  {
    $this->validate($request, [
        'id' => 'required',
        'email' => 'required',
        'fname' => 'required',
        'lname' => 'required',
        'id_proof' => 'required',
        'bank_acc_no' => 'required',
        'bank_ifsc_code' => 'required',
        'phoneno' =>'required',
      ]);
    $user = Market::where('id',$request->id)->first();
    $user->fname = $request->fname;
    $user->lname = $request->lname;
    $user->email = $request->email;
    $user->id_proof = $request->id_proof;
    $user->bank_acc_no = $request->bank_acc_no;
    $user->bank_ifsc_code = $request->bank_ifsc_code;
    $user->phoneno = $request->phoneno;
    if($request->password!=NULL)
      $user->password = md5($user->password);
    $user->save();
    $msg = array(
      'status' => 'success',
      'msg' => 'User edit successfully' );
    return response()->json($msg, 200);
  }

  /** function to disply coupon conversion */
  public function couponconversion()
  {
    $coupon_conversion = Coupon_Activity::where('admin_email',Session::get('memail'))->get();
    return view('market.couponconversion',compact('coupon_conversion'));
  }

  /** function to display the payouts */
  public function payouts()
  {

  }


  public function requestpayout(Request $request){
    $this->validate($request, [
        'id' => 'required',
        'email' => 'required',
        'fname' => 'required',
        'lname' => 'required',
        'id_proof' => 'required',
        'bank_acc_no' => 'required',
        'bank_ifsc_code' => 'required',
        'phoneno' =>'required',
      ]);
  }




}
