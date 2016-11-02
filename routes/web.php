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
Route::get('/', 'IndexController@index');
Route::get('login','IndexController@login');
Route::post('login','IndexController@postLogin');
Route::get('register','IndexController@register');
Route::get('logout','IndexController@logout');
Route::post('register','IndexController@postregister');

Route::get('payment','UserController@testing');
Route::post('indipay/response','UserController@response');

Route::get('home', 'UserDashboardController@home');
Route::get('home/{sub_id}/{std}', 'UserDashboardController@chap_name');
Route::get('home/{sub_id}/{std}/{chap_id}', 'UserDashboardController@chap_page');
Route::get('home/askadoubt','UserDashboardController@ask_a_doubt');

Route::get('/form', function() {
    return View::make('form');
});
Route::get('get_question','QuestionController@get_question');
Route::post('submit_question','QuestionController@submit_question');
Route::post('ques_prev_sub','QuestionController@ques_prev_sub');
 

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



	 
	
	 
});
Route::get('/form', function() {
    return View::make('form');
});
 
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



