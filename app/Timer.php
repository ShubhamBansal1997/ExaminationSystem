<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Timer extends Model
{
    public $timestamps = False;
    protected $table = 'timer';
    protected $fillable = ['id','timer'];

}
