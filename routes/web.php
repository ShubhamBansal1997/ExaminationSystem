<?php
use Illuminate\Support\Facades\Input;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

use App\Helpers;
use App\Coupons;
Route::get('/', 'IndexController@index');
Route::get('/allexperts', 'IndexController@allexperts');
Route::get('/bookexpert/{name}/{pk}', 'IndexController@bookexpert');
Route::get('login','IndexController@login');
Route::post('login','IndexController@postLogin')->middleware('web');
Route::get('register','IndexController@register');
Route::get('logout','IndexController@logout');
Route::post('register','IndexController@postregister')->middleware('web');
Route::post('verifyotp','IndexController@verifyotp')->middleware('web');
Route::get('neet', 'IndexController@neet')->middleware('web');
Route::get('jipmer', 'IndexController@jipmer')->middleware('web');
Route::get('aiims', 'IndexController@aiims')->middleware('web');
Route::get('eamcet', 'IndexController@eamcet')->middleware('web');
Route::get('payment','UserController@testing');
Route::post('indipay/response','PaymentController@response');
Route::get('paymentgateway/{price}/{couponcode?}','PaymentController@paymentgateway');
Route::get('checkPromoCode/{code}', 'IndexController@checkPromoCode' );
Route::post('addBooking', 'IndexController@addLead');
Route::get('success', 'IndexController@success');
Route::get('handle_redirect', 'IndexController@payment_redirect');
Route::get('home', 'UserDashboardController@home');
Route::get('home/{sub_id}/{std}', 'UserDashboardController@chap_name');
Route::get('home/{sub_id}/{std}/{chap_id}', 'UserDashboardController@chap_page');
Route::get('home/askadoubt',function(){
    return view('pages.askadoubt');
});
Route::post('checkcouponcode',function(Request $request){
    $coupon_code = $request->input('coupon_code');
    $coupon = Coupons::where('coupon_code',$coupon_code);
    if($coupon->count())
        return FALSE;
    else
        $coupon->coupon_percent;

});
Route::post('applycouponcode','PaymentController@applycouponcode');
Route::post('payment',function()
    {
        dd("fail");
    });
Route::get('buypackage/{packagename}','PaymentController@package');

Route::post('home/askadoubt','UserDashboardController@ask_a_doubt')->middleware('web');
Route::get('package/{pname?}',function($pname=NULL){


        if($pname==NULL)
            return view('pages.pricingpage');
        else if($pname=='1year')
            return view('pages.1year');
        else if($pname=='2year')
            return view('pages.2year');
        else if($pname=='2test')
            return view('pages.2test');
        else if($pname=='1adv')
            return view('pages.1adv');
        else if($pname=='2adv')
            return view('pages.2adv');
        else
            return view('pages.pricingpage');
    // }
    // else
    //     return Redirect::back();
});

Route::get('/form', function() {
    return View::make('form');
});
Route::get('get_question','QuestionController@get_question');
Route::post('submit_question','QuestionController@submit_question');
Route::post('ques_prev_sub','QuestionController@ques_prev_sub');
//Route::get('qpage/{sub_id}/{chap_id}/{ques_cat}','QuestionController@question_page');
Route::get('qpage/{sub_id}/{chap_id}/{ques_cat}','QuestionController@question_page');

Route::get('social/login/redirect/{provider}', ['uses' => 'Auth\AuthController@redirectToProvider', 'as' => 'social.login']);
Route::get('social/login/{provider}', 'Auth\AuthController@handleProviderCallback');


Route::group(['namespace' => 'admin', 'prefix' => 'admin'], function () {

	Route::get('/', 'IndexController@index');
	Route::get('home','AdminDashboardController@index');
	Route::get('login', 'IndexController@index');
	Route::post('login', 'IndexController@postLogin');
	Route::get('logout', 'IndexController@logout');
	Route::post('image/upload','QuestionController@upload_image');
	Route::post('addques','QuestionController@addquestion');
	Route::get('addques/{sub_id}/{std}','QuestionController@question');
  Route::get('editques/{ques_id}/{sub_id}/{std}','QuestionController@editquestion');
  Route::get('deleteques/{ques_id}/{sub_id}/{std}','QuestionController@deletequestion');
  Route::get('viewques/{sub_id}/{std}','QuestionController@viewquestion');
  Route::post('viewques','QuestionController@viewquestionlist');
  Route::get('view_look/{ques_id}','QuestionController@view_look');
  Route::get('view_look1/{ques_id}','QuestionController@view_look1');
  Route::get('view_look2/{ques_id}','QuestionController@view_look2');
  Route::get('content','EmployeeController@list_content');
  Route::get('marketers','MarketingController@index');
  Route::get('view_users','AdminDashboardController@u_list');

  Route::get('coupons',function()
      {
          $email = Session::get('aemail');
          return view('admin.pages.coupon',compact('email'));
      });

  Route::get('couponactivity',function()
      {
          $email = Session::get('aemail');
          return view('admin.pages.couponactivity',compact('email'));
      });

  Route::get('payouts',function()
      {
          $email = Session::get('aemail');
          return view('admin.pages.payout',compact('email'));
      });

  Route::get('allcoupons',function(){
    return view('admin.pages.allcoupons');
  });
  Route::get('allcouponactivity',function(){
    return view('admin.pages.allcouponactivity');
  });
  Route::get('allpayouts',function(){
    return view('admin.pages.allpayouts');
  });
  Route::get('paythepayout/{id}','MarketingController@paythepayout');

  Route::post('/adduser','MarketingController@adduser')->middleware('web');
  Route::get('/getmarketdata/{marketid}','MarketingController@getuser');
  Route::get('/marketstatus/{marketid}','MarketingController@changestatus');
  Route::get('/deletemarket/{marketid}','MarketingController@deleteuser');
  Route::post('/editmarketuser','MarketingController@editmarketuser')->middleware('web');
  Route::get('/marketingpayouts','MarketingController@marketingpayouts');


  // Lead Page
  Route::get('/list_leads', 'LeadController@list_leads');
  Route::post('/change_lead_status', 'LeadController@change_lead_status');  

  // experts page routes
  Route::get('/addexpert','ExpertController@list_experts');
  Route::get('/getexperts/{id}','ExpertController@index_experts');
  Route::post('/createexpert','ExpertController@store_expert');
  Route::get('/addeditexpertpage/{id?}', 'ExpertController@expert');
  Route::post('/addeditexpert', 'ExpertController@update_store_expert');
  Route::delete('/deleteexpert/{id}','ExpertController@destroy_expert');
  Route::post('/updateexpert/{id}','ExpertController@update_expert');
  Route::post('/addExpertDescription','ExpertController@store_descrption');
  Route::post('/addslot', 'ExpertController@addslot');
  Route::get('/deleteslot/{id}', 'ExpertController@deleteSlot');
  Route::get('/fetchslot/{id}', 'ExpertController@fetchSlot');
  Route::get('/updateExpertStatus/{id}', 'ExpertController@update_status');


  Route::get('/expertdescrption','ExpertController@list_expert_descrption');
  Route::get('/expertpayouts','ExpertController@list_expert_payouts');
});

// marketing login page
Route::get('/marketing','market\IndexController@index');

Route::group(['namespace' => 'market', 'prefix' => 'marketing'], function () {

  //Route::get('login','IndexController@index');
  Route::post('login','IndexController@postLogin')->middleware('web');
  Route::get('home','DashboardController@index');
  Route::get('logout','IndexController@logout');
  Route::get('coupons','DashboardController@coupons');
  Route::get('couponconversion','DashboardController@couponconversion');
  Route::get('payouts','DashboardController@payouts');
  Route::post('addcoupon','DashboardController@addcoupon')->middleware('web');
  Route::get('getmarketuser/{id}','DashboardController@getmarketuser')->middleware('web');
  Route::post('updatemarketuser','DashboardController@updatemarketuser')->middleware('web');
  Route::get('couponstatus/{id}','DashboardController@couponstatus');
  Route::get('deletecoupon/{id}','DashboardController@deletecoupon');
  Route::post('requestpayout','DashboardController@requestpayout')->middleware('web');
  Route::get('profile','DashboardController@profile')->middleware('web');
  Route::get('/list_leads', 'LeadController@list_leads');
  Route::post('/add_market_to_lead', 'LeadController@add_market');
  Route::post('/change_lead_status', 'LeadController@change_lead_status');  


});

Route::get('/form', function() {
    return View::make('form');
});
Route::get('/test',function() {
    return view('pages.chap_name1');
});
Route::get('/firstquestion','QuestionController@get_first_question');
Route::get('upload/image', function() {
    $allowed = array('png', 'jpg', 'gif');
    $rules = [
        'file' => 'required|image|mimes:jpeg,jpg,png,gif'
    ];
    $data = Input::all();
    $validator = Validator::make($data, $rules);
    if ($validator->fails()) {
        return '{"status":"Invalid File type"}';
    }
    if(Input::hasFile('file')){
        $extension = Input::file('file')->getClientOriginalExtension();
        if(!in_array(strtolower($extension), $allowed)){
            return '{"status":"Invalid File type"}';
        } else {
            $filename = uniqid() . '_attachment.' . $extension;
            if (Input::file('file')->move('source/', $filename)) {
                echo url('source/' . $filename);
                exit;
            }
        }
    } else {
        return '{"status":"Invalid File type"}';
    }
});

Route::get('/questions/{sub_id}/{chap_id}/{ques_cat}','QuestionController@get_all_questions')->middleware(['api','cors']);
Route::get('/samplequestionpage',function(){
  return view('questionpage');
});

# api routes
Route::get('/api/allpks', 'QuestionController@all_ques_pks');
Route::post('/api/singlequestion', 'QuestionController@getsinglequestion');

