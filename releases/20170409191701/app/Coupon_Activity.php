<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coupon_Activity extends Model
{
    public $timestamps = true;
    protected $table = 'coupon_activities';
    protected $fillable = ['admin_email', 'user_email', 'coupon_percent', 'price', 'final_amount', 'coupon_name' ];
    public static function coup_det($coupon_code)
    {
    	$query = Coupon_Activity::where('coupon_name',$coupon_name)->first();
    	return $query;
    }

}
