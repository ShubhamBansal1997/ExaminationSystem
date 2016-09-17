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

Route::get('payment','UserController@testing');
Route::post('indipay/response','UserController@response');