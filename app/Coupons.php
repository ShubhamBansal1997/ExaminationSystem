<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coupons extends Model
{
    public $timestamps = true;
    protected $table = 'coupons';
    protected $fillable = ['coupon_name', 'coupon_percent', 'coupon_number', 'admin_email', 'coupon_active' ,'coupon_delete', 'coupon_type'];
    public static function coup_det($coupon_code)
    {
    	$query = Coupons::where('coupon_name',$coupon_code)->first();
    	return $query;
    }
}
