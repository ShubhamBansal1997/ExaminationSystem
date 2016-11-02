<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Questions_attempt extends Model
{
    protected $table = 'questions_attempt';
    protected $fillable = [ 'ques_id','ques_status','user_email','sub_id','chap_id','ques_cat','ques_input' ];
    public $timestamps = false;
}
