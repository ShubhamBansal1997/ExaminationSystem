<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Users;

class Coupon_Activity extends Model
{
    public $timestamps = true;
    protected $table = 'coupon_activities';
    protected $fillable = ['admin_email', 'user_email', 'coupon_percent', 'price', 'final_amount', 'coupon_name','admin_share','user_name','coupon_type','activity_status','active' ];
    public static function coup_det($coupon_code)
    {
    	$query = Coupon_Activity::where('coupon_name',$coupon_name)->first();
    	return $query;
    }

    public static function user()
    {
      $this->hasOne('Users','user_email','email');
    }

}
