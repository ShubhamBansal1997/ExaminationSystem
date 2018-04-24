<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Session;

class Admins extends Model
{
    public $timestamps = false;
    protected $table = 'admins';
    protected $fillable = ['name','email','password','a_status','amount'];
    public static function userName()
    {
    	$email = Session::get('aemail');
    	$query = Admins::where('email',$email)->first();
    	return $query->name;
    }
}
