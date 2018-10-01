<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Session;

class Users extends Model
{
    protected $table = 'users';

    protected $fillable = ['name','email','mobile','type'];

    public static function checkUserStatus()
    {
    	$email = Session::get('email');
    	$query = Users::where('email',$email)->first();
    	return $query->status;
    }
    public static function userName()
    {
    	$email = Session::get('email');
    	$query = Users::where('email',$email)->first();
    	return $query->name;
    }

}
