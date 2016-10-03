<?php

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
 

Route::group(['namespace' => 'admin', 'prefix' => 'admin'], function () {
	
	Route::get('/', 'IndexController@index');
	Route::get('home','AdminDashboardController@index');
	Route::get('login', 'IndexController@index');
	Route::post('login', 'IndexController@postLogin');
	Route::get('logout', 'IndexController@logout');
	Route::get('addques/{sub_id}/{chap_id}', 'QuestionController@question');
	Route::post('image/upload','QuestionController@upload_image');
	Route::post('admin/addques','QuestionController@addquestion');
	 
	
	 
});




