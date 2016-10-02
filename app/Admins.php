<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admins extends Model
{
    protected $table = 'admins';
    protected $fillable = ['name','email','password','a_status'];
    public static function userName()
    {
    	$email = Session::get('aemail');
    	$query = Users::where('email',$email)->first();
    	return $query->name;
    }
}
