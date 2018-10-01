<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    public $timestamps = true;
    protected $table = 'transactions';
    protected $fillable = ['tr_id', 'admin_email', 'amount', 'method', 'initiate' ];
    
}
