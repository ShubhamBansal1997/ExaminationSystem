<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExpertBooking extends Model
{
    public $timestamps = 'true';
    protected $table = 'expert';
    protected $fillable = ['id', 'expert_id', 'expert_name', 'student_name', 'student_email', 'student_phone', 'student_date', 'slot', 'price', 'promo_code', 'status']
}
