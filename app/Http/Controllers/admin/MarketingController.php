<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;

use App\Http\Requests;

use Session;
use Intervention\Image\ImageManagerStatic as Image;
use App\Market;
use App\Market_Payout;


class MarketingController extends Controller
{
    /** function to display the list of the not deleted marketing users */
    public function index()
    {
      $markets = Market::where('delete',false)->get();
      return view('admin.pages.marketers', compact('markets'));
    }
    /** to add marketing user to the database */
    public function adduser(Request $request)
    {

      $this->validate($request, [
        'email' => 'required',
        'fname' => 'required',
        'lname' => 'required',
        'max_discount_package' => 'required',
        'max_discount_expert' => 'required',
        'id_proof' => 'required',
        'id_proof_file' => 'required',
        'bank_acc_no' => 'required',
        'bank_ifsc_code' => 'required',
        'phoneno' =>'required',
        'password' => 'required'
        ]);
      $user = new Market;
      $user->fname = $request->fname;
      $user->lname = $request->lname;
      $user->email = $request->email;
      $user->max_discount_package = $request->max_discount_package;
      $user->max_discount_expert = $request->max_discount_expert;
      $user->id_proof = $request->id_proof;

      $user->id_proof_file = $request->id_proof . '.' . $request->file('id_proof_file')->getClientExtension();
      $request->file('id_proof_file')->move(base_path() . '/public/images/id_proof/', $imageName);
      $user->phoneno = $request->phoneno;
      $user->password = md5($request->password);
      $user->bank_acc_no = $request->bank_acc_no;
      $user->bank_ifsc_code = $request->bank_ifsc_code;
      $user->description = $request->description;
      $user->active = true;
      $user->delete = false;
      $user->save();
      return Redirect::back();

    }

    /** get the marketing guy details */
    public function getuser($marketid)
    {
      $user = Market::where('id',$marketid)->first();
      $user->toArray();

      return response()->json($user, 200);
    }

    /** delete user */
    public function deleteuser($marketid)
    {
      $user = Market::where('id',$marketid)->first();
      $user->active = false;
      $user->delete = true;
      $user->save();
      $msg = array(
        'status' => 'success',
        'msg' => 'Marketing user deleted successfully'
         );
      return response()->json($msg, 200);
    }

    /** change the status of the user */
    public function changestatus($marketid)
    {
      $user = Market::where('id',$marketid)->first();
      if($user->active==false){
        $user->active=true;
      }else{
        $user->active=false;
      }
      $user->save();
      $msg = array(
        'status' => 'success',
        'msg' => 'Status Changed Succesfully' );
      return response()->json($msg, 200);
    }

    /** function to edit the user */
    public function editmarketuser(Request $request)
    {
      $this->validate($request, [
        'id' => 'required',
        'email' => 'required',
        'fname' => 'required',
        'lname' => 'required',
        'max_discount' => 'required',
        'id_proof' => 'required',
        'bank_acc_no' => 'required',
        'bank_ifsc_code' => 'required',
        'phoneno' =>'required',
        'comission' => 'required',
        ]);
      $user = Market::where('id',$request->id)->first();
      $user->fname = $request->fname;
      $user->lname = $request->lname;
      $user->email = $request->email;
      $user->max_discount = $request->max_discount;
      $user->id_proof = $request->id_proof;
      $user->bank_acc_no = $request->bank_acc_no;
      $user->bank_ifsc_code = $request->bank_ifsc_code;
      $user->phoneno = $request->phoneno;
      $user->comission = $request->comission;
      if($request->password!=NULL)
        $user->password = md5($user->password);
      $user->save();
      $msg = array(
        'status' => 'success',
        'msg' => 'User edit successfully' );
      return response()->json($msg, 200);
    }

    public function marketingpayouts()
    {
      $payouts = Market_Payout::all();
      return view('admin.pages.marketingpayouts',compact('payouts'));
    }

    public function paythepayout($id)
    {
      $payout = Market_Payout::where('id',$id)->first();
      $payout->active = false;
      $payout->save();
      $msg = array(
        'status' => 'success',
        'msg' => 'payout done successfully');
      return response()->json($msg, 200);
    }
}
