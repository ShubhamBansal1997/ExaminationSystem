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
use App\Market_Payout;
use Redirect;

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
    echo"dfghj";
    $this->validate($request, [
        'coupon_name' => 'required|unique:coupons',
        'coupon_number' => 'required',
        'coupon_type' => 'required',
      ]);
    //dd($request);
        if(Session::get('memail')!=NULL)
          $user = Market::where('email',Session::get('memail'))->first();

        $coupon = new Coupons;
        $coupon->coupon_name = strtoupper($request->coupon_name);
        $coupon->coupon_percent = $request->max_discount;
        $coupon->coupon_number = $request->coupon_number;
        $coupon->coupon_type = $request->coupon_type;


        $coupon->coupon_active = true;
      
        $coupon->admin_email = Session::get('memail');
        $coupon->save();
        return Redirect::back();
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
        'max_discount_package' => 'required',
        'max_discount_expert' => 'required',
        'id_proof' => 'required',
        'bank_acc_no' => 'required',
        'bank_ifsc_code' => 'required',
        'phoneno' =>'required',
        ]);
      $user = Market::where('id',$request->id)->first();
      //dd($request);
      $user->fname = $request->fname;
      $user->lname = $request->lname;
      $user->email = $request->email;
      $user->max_discount_package = $request->max_discount_package;
      $user->max_discount_expert = $request->max_discount_expert;
      $user->id_proof = $request->id_proof;
      //dd($request->file('id_proof_file'));
      if($request->file('id_proof_file')!=NULL){
        $user->id_proof_file = $request->id_proof . '.' . $request->file('id_proof_file')->getClientOriginalName();
        $request->file('id_proof_file')->move(base_path() . '/public/images/id_proof/', $user->id_proof_file);
      }
      if($request->file('profile_pic')!=NULL){
        $user->profile_pic = $request->id_proof . '.' . $request->file('profile_pic')->getClientOriginalName();
        $request->file('profile_pic')->move(base_path() . '/public/images/market/', $user->profile_pic);
      }
      $user->phoneno = $request->phoneno;
      if($request->password!=NULL){
        $user->password = md5($request->password);
      }
      $user->bank_acc_no = $request->bank_acc_no;
      $user->bank_ifsc_code = $request->bank_ifsc_code;
      $user->description = $request->descrption;
      $user->active = true;
      $user->delete = false;
      $user->save();
      return Redirect::back();
  }

  /** function to disply coupon conversion */
  public function couponconversion()
  {
    $coupons = Coupon_Activity::where('admin_email',Session::get('memail'))->where('active',1)->get();
    $user = Market::where('email',Session::get('memail'))->first();
    return view('market.couponconversion',compact('coupons','user'));
  }
    /** function to disply all coupon activities */
  public function allcouponactivities()
  {
    $coupons = Coupon_Activity::where('admin_email',Session::get('memail'))->where('active',1)->get();
    $user = Market::where('email',Session::get('memail'))->first();
    return view('market.allcouponactivities',compact('coupons','user'));
  }

  /** function to display the payouts */
  public function payouts()
  {
    $user = Market::where('email',Session::get('memail'))->first();
    //dd(Session::get('memail'));
    //dd($user);
    $payouts = Market_Payout::where('email',Session::get('memail'))->get();
    return view('market.payout',compact('user','payouts'));
  }


  public function requestpayout(Request $request){
    $this->validate($request, [
        'id' => 'required',
        'amount' => 'required',
        'method' => 'required',
      ]);
    $user = Market::where('email',Session::get('memail'))->first();
    $payout = new Market_Payout;
    $payout->name = $user->fname . ' ' . $user->lname;
    $payout->amount = $request->amount;
    $payout->type = $request->method;
    $payout->bank_acc_no = $user->bank_acc_no;
    $payout->bank_ifsc_code = $user->bank_ifsc_code;
    $payout->phoneno = $user->phoneno;
    $payout->active = false;
    $payout->email = $user->email;
    $payout->save();
    $msg = array(
      'status' => 'success',
      'msg' => 'Payout request successfully generated' );
    return response()->json($msg, 200);

  }

  public function profile(Request $request) {
    $user = Market::where('email', Session::get('memail'))->first();
    return view('market.profile', compact('user'));
  }




}
