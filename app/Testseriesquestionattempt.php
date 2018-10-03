<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Testseriesquestionattempt extends Model
{
    public $timestamps = False;
    protected $table = 'testseriesquestionattempt';
    protected $fillable = [ 'id','email','correct','incorrect','review','quesid'];

}
