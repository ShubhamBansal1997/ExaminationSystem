<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    public $timestamps = True;
    protected $table = 'leads';
    protected $fillable = ['id', 'expert_id', 'market_id', 'expert_name', 'user_name', 'user_email', 'user_phone', 'user_date', 'user_time', 'user_charges', 'lead_status'];
}
