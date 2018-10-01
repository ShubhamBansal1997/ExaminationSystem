<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExpertBooking extends Model
{
    public $timestamps = True;
    protected $table = 'expertsbooking';
    protected $fillable = [ 'expert_id', 'booking_expert_name', 'booking_date', 'booking_time', 'booking_charges', 'booking_promo_code', 'booking_promo_off', 'booking_expert_charges', 'booking_user_name', 'booking_user_email', 'booking_user_phone', 'booking_payment', 'booking_payment_gateway_id', 'booking_final_payment_id'];
}
