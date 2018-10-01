<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    public $timestamps = true;
    protected $table = 'packages';
    protected $fillable = ['user_email', 'tr_id', 'subject', 'valid_date' ];
    
}
