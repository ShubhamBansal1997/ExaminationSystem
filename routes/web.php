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
Route::post('login','IndexController@login');
Route::get('register','IndexController@register');
Route::get('logout','IndexController@logout');
Route::post('postregister','IndexController@postregister');

Route::get('payment','UserController@testing');
Route::post('indipay/response','UserController@response');

Route::get('/home', 'UserDashboardController@home');
Route::get('/home/{sub_name}/{class}', 'UserDashboardController@chap_name');
Route::get('/home/{sub_name}/{class}/{chap_name}', 'UserDashboardController@chap_page');
Route::get('/home/askadoubt','UserDashboardController@ask_a_doubt');


