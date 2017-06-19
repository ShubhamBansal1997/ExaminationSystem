<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User_transaction extends Model
{
    protected $table = 'User_transactions';
	  protected $timestamps = 'true';
	  protected $fillable = ['user_email','coupon_code','price','package'];
}
