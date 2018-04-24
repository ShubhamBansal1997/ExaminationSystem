<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Softon\Indipay\Facades\Indipay;
use App\Coupons;
use App\Coupon_Activity;
use App\Transaction;
use Session;
use App\Users;

use App\User_Transaction;
use App\Admins;
use App\Package;
use Carbon\Carbon;

class PaymentController extends Controller
{
    public function packageprice()
    {
        $p = Session::get('pname');
        if($p=='p1'||$p=='p2'||$p=='p3'||$p=='t1'||$p=='t2'||$p=='t3')
            return 200;
        elseif($p=='p4'||$p=='p5'||$p=='p6'||$p=='p8'||$p=='p9'||$p=='p10'||$p=='t4'||$p=='t5'||$p=='t6')
            return 350;
        elseif($p=='p7'||$p=='t7')
            return 500;
        elseif($p=='a1'||$p=='a2'||$p=='a3')
            return 600;
        elseif($p=='p11'||$p=='p12'||$p=='p13')
            return 650;
        elseif($p=='a4'||$p=='a5'||$p=='a6')
            return 700;
        elseif($p=='a7')
            return 800;
        elseif($p=='p14')
            return 900;
        elseif($p=='a8'||$p=='a9'||$p=='a10')
            return 1000;
        elseif($p=='a11'||$p=='a12'||$p=='a13'||$p=='a14')
            return 1100;
        
        
    }
    public function package($packagename)
    {
        Session::set('pname',$packagename);
        return view('pages.applycouponcode');
    }
    public function applycouponcode(Request $request)
    {
        $coupon_code = $request->input('coupon_code');
        $coupon = $request->input('coupon');
        $proceed = $request->input('proceed');
        //dd($request);
        $email = Session::get('email');
        $user = Users::where('email',$email)->first();
        $name = explode(" ", $user->name);
        $pname = Session::get('pname');
        $today = date("Ymd");
        $rand = strtoupper(substr(uniqid(sha1(time())),0,4));
        $tr_id = $today . $rand;
        if($coupon_code!=NULL)
        {
            $coupon_code = strtoupper($coupon_code);
            $coupon = Coupons::where('coupon_name',$coupon_code)
                    ->where('coupon_active',TRUE)
                    ->first();
            
            if($coupon->coupon_number)
            {
                $coupon->coupon_number = $coupon->coupon_number - 1;
                $coupon->save();
                $price = $this->packageprice();
                $dis = $coupon->coupon_percent;
                $price = $price - (($price * $dis ) /100);
                
                // we should session the parameterrs according to our need 
                $parameters = [

                'key' => 'gtKFFx',
                'txnid' => $tr_id,
                'surl' => 'http://localhost:8000/indipay/response',
                'furl' => 'http://localhost:8000/indipay/response',
                'firstname' => $name[0],
                'email' => $user->email,
                'phone' => $user->mobile,
                'productinfo' => $pname,
                'service_provider' => 'neetgurumantra',
                'amount' => $price,
                'udf1' => $couponcode,

              ];
                
            }
            else
            {
                Session::flash('coupon_unsuccessful', 'You have entered a wrong coupon number');        
            }    
        }
        else
        {

            $price = $this->packageprice();
            // we should session the parameterrs according to our need 
            $parameters = [

            'key' => 'gtKFFx',
            'txnid' => $tr_id,
            'surl' => 'http://localhost:8000/indipay/response',
            'furl' => 'http://localhost:8000/indipay/response',
            'firstname' => $name[0],
            'email' => $user->email,
            'phone' => $user->mobile,
            'productinfo' => $pname,
            'service_provider' => 'neetgurumantra',
            'amount' => $price,

          ];
            
        }
        $order = Indipay::prepare($parameters);
        //dd($order);
        return Indipay::gateway('payumoney')->process($order);
        
    }
    
   	public function response(Request $request)
    
    {
        // For default Gateway
        $response = Indipay::response($request);
        
        // For Otherthan Default Gateway
        $response = Indipay::gateway('payumoney')->response($request);

        if($response["status"]=="success"&&$response["ud1"]!=NULL)
        {
            $coupon = Coupons::coup_det($response["udf1"]);
            $activity = new Coupon_Activity;
            $activity->user_email = Session::get('email');
            $activity->admin_email = $coupon->coupon_email;
            $activity->coupon_percent = $coupon->coupon_percent;
            $price = $this->packageprice();
            $activity->price = $this->packageprice();
            $activity->final_amount = $response["amount"];
            $activity->coupon_name = $response["udf1"];
            $activity->admin_share =  (50 - $coupon->coupon_percent) * $price;
            $activity->save();

            $transaction = new User_Transaction;
            $transaction->user_email = Session::get('email');
            $transaction->coupon_code = $response["udf1"];
            $transction ->price = $response["udf1"];
            $transction->package = $response["productinfo"];
            $transction->save();

            $admin = Admins::where('email',$coupon_email)->first();
            $admin->amount = $admin->amount + $response["amount"];
            $admin->save();

            $email = Session::get('email');
            $tr_id = $response["txnid"];
            $package = $response["productinfo"];
            $this->packageentry($email,$tr_id,$package);

        }
        elseif($response["status"]=="success")
        {
            $transaction = new User_Transaction;
            $transaction->user_email = Session::get('email');
            $transaction->coupon_code = $response["udf1"];
            $transction ->price = $response["udf1"];
            $transction->package = $response["productinfo"];
            $transction->save();
            $email = Session::get('email');
            $tr_id = $response["txnid"];
            $package = $response["productinfo"];
            $this->packageentry($email,$tr_id,$package);            
        }
        else
        {
            dd("fail");
        }
                
        return view('pages.paymentconfirm');
    
    }  
    public function packageentry($email,$tr_id,$package)
    {
        switch ($package) {
            case 'p1':
                    $this->singlepackage('phy',$email,$tr_id,1);
                break;
            case 'p2':
                    $this->singlepackage('chem',$email,$tr_id,1);
                break;
            case 'p3':
                    $this->singlepackage('bio',$email,$tr_id,1);
                break;
            case 'p4':
                    $this->singlepackage('phy',$email,$tr_id,1);
                    $this->singlepackage('chem',$email,$tr_id,1);
                break;
            case 'p5':
                    $this->singlepackage('phy',$email,$tr_id,1);
                    $this->singlepackage('bio',$email,$tr_id,1);
                break;
            case 'p6':
                    $this->singlepackage('chem',$email,$tr_id,1);
                    $this->singlepackage('bio',$email,$tr_id,1);
                break;
            case 'p7':
                    $this->singlepackage('phy',$email,$tr_id,1);
                    $this->singlepackage('chem',$email,$tr_id,1);
                    $this->singlepackage('bio',$email,$tr_id,1);
                break;
            case 'p8':
                    $this->singlepackage('phy',$email,$tr_id,2);
                break;
            case 'p9':
                    $this->singlepackage('chem',$email,$tr_id,2);
                break;
            case 'p10':
                    $this->singlepackage('bio',$email,$tr_id,2);
                break;
            case 'p11':
                    $this->singlepackage('phy',$email,$tr_id,2);
                    $this->singlepackage('chem',$email,$tr_id,2);
                break;
            case 'p12':
                    $this->singlepackage('phy',$email,$tr_id,2);
                    $this->singlepackage('bio',$email,$tr_id,2);
                break;
            case 'p13':
                    $this->singlepackage('chem',$email,$tr_id,2);
                    $this->singlepackage('bio',$email,$tr_id,2);
                break;
            case 'p14':
                    $this->singlepackage('phy',$email,$tr_id,2);
                    $this->singlepackage('chem',$email,$tr_id,2);
                    $this->singlepackage('bio',$email,$tr_id,2);
                break;
            case 't1':
                    $this->singlepackage('neet',$email,$tr_id,2);
                break;
            case 't2':
                    $this->singlepackage('aiims',$email,$tr_id,2);
                break;
            case 't3':
                    $this->singlepackage('eamcet',$email,$tr_id,2);
                break;
            case 't4':
                    $this->singlepackage('neet',$email,$tr_id,2);
                    $this->singlepackage('aiims',$email,$tr_id,2);
                break;
            case 't5':
                    $this->singlepackage('neet',$email,$tr_id,2);
                    $this->singlepackage('eamcet',$email,$tr_id,2);
                break;
            case 't6':
                    $this->singlepackage('aiims',$email,$tr_id,2);
                    $this->singlepackage('eamcet',$email,$tr_id,2);
                break;
            case 't7':
                    $this->singlepackage('neet',$email,$tr_id,2);
                    $this->singlepackage('aiims',$email,$tr_id,2);
                    $this->singlepackage('eamcet',$email,$tr_id,2);
                break;
            case 'a1':
                    $this->singlepackage('phy',$email,$tr_id,1);
                    $this->singlepackage('chem',$email,$tr_id,1);
                    $this->singlepackage('bio',$email,$tr_id,1);
                    $this->singlepackage('neet',$email,$tr_id,1);
                break;
            case 'a2':
                    $this->singlepackage('phy',$email,$tr_id,1);
                    $this->singlepackage('chem',$email,$tr_id,1);
                    $this->singlepackage('bio',$email,$tr_id,1);
                    $this->singlepackage('aiims',$email,$tr_id,1);
                break;
            case 'a3':
                    $this->singlepackage('phy',$email,$tr_id,1);
                    $this->singlepackage('chem',$email,$tr_id,1);
                    $this->singlepackage('bio',$email,$tr_id,1);
                    $this->singlepackage('eamcet',$email,$tr_id,1);
                break;
            case 'a4':
                    $this->singlepackage('phy',$email,$tr_id,1);
                    $this->singlepackage('chem',$email,$tr_id,1);
                    $this->singlepackage('bio',$email,$tr_id,1);
                    $this->singlepackage('neet',$email,$tr_id,1);
                    $this->singlepackage('aiims',$email,$tr_id,1);
                break;
            case 'a5':
                    $this->singlepackage('phy',$email,$tr_id,1);
                    $this->singlepackage('chem',$email,$tr_id,1);
                    $this->singlepackage('bio',$email,$tr_id,1);
                    $this->singlepackage('neet',$email,$tr_id,1);
                    $this->singlepackage('eamcet',$email,$tr_id,1);
                break;
            case 'a6':
                    $this->singlepackage('phy',$email,$tr_id,1);
                    $this->singlepackage('chem',$email,$tr_id,1);
                    $this->singlepackage('bio',$email,$tr_id,1);
                    $this->singlepackage('aiims',$email,$tr_id,1);
                    $this->singlepackage('eamcet',$email,$tr_id,1);
                break;
            case 'a7':
                    $this->singlepackage('phy',$email,$tr_id,1);
                    $this->singlepackage('chem',$email,$tr_id,1);
                    $this->singlepackage('bio',$email,$tr_id,1);
                    $this->singlepackage('neet',$email,$tr_id,1);
                    $this->singlepackage('aiims',$email,$tr_id,1);
                    $this->singlepackage('eamcet',$email,$tr_id,1);
                break;
            case 'a8':
                    $this->singlepackage('phy',$email,$tr_id,2);
                    $this->singlepackage('chem',$email,$tr_id,2);
                    $this->singlepackage('bio',$email,$tr_id,2);
                    $this->singlepackage('neet',$email,$tr_id,2);
                break;
            case 'a9':
                    $this->singlepackage('phy',$email,$tr_id,2);
                    $this->singlepackage('chem',$email,$tr_id,2);
                    $this->singlepackage('bio',$email,$tr_id,2);
                    $this->singlepackage('aiims',$email,$tr_id,2);
                break;
            case 'a10':
                    $this->singlepackage('phy',$email,$tr_id,2);
                    $this->singlepackage('chem',$email,$tr_id,2);
                    $this->singlepackage('bio',$email,$tr_id,2);
                    $this->singlepackage('eamcet',$email,$tr_id,2);
                break;
            case 'a11':
                    $this->singlepackage('phy',$email,$tr_id,2);
                    $this->singlepackage('chem',$email,$tr_id,2);
                    $this->singlepackage('bio',$email,$tr_id,2);
                    $this->singlepackage('neet',$email,$tr_id,2);
                    $this->singlepackage('aiims',$email,$tr_id,2);
                break;
            case 'a12':
                    $this->singlepackage('phy',$email,$tr_id,2);
                    $this->singlepackage('chem',$email,$tr_id,2);
                    $this->singlepackage('bio',$email,$tr_id,2);
                    $this->singlepackage('neet',$email,$tr_id,2);
                    $this->singlepackage('eamcet',$email,$tr_id,2);
                break;
            case 'a13':
                    $this->singlepackage('phy',$email,$tr_id,2);
                    $this->singlepackage('chem',$email,$tr_id,2);
                    $this->singlepackage('bio',$email,$tr_id,2);
                    $this->singlepackage('aiims',$email,$tr_id,2);
                    $this->singlepackage('eamcet',$email,$tr_id,2);
                break;
            case 'a14':
                    $this->singlepackage('phy',$email,$tr_id,2);
                    $this->singlepackage('chem',$email,$tr_id,2);
                    $this->singlepackage('bio',$email,$tr_id,2);
                    $this->singlepackage('neet',$email,$tr_id,2);
                    $this->singlepackage('aiims',$email,$tr_id,2);
                    $this->singlepackage('eamcet',$email,$tr_id,2);
                break;
            default:
                # code...
                break;
        }
    }
    public function singlepackage($pname,$email,$tr_id,$year)
    {
        $package = new Package;
        $package->user_email = $email;
        $package->tr_id = $tr_id;
        $package->subject = $pname;
        if($year==1)
        $package->valid_date = Carbon::now()->addYear();
        elseif($year==2)
        $package->valid_date = Carbon::now()->addYear(2);
        $package->save();        
    }
}
