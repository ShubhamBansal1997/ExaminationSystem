<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    public $timestamps = False;
    protected $table = 'report_error';
    protected $fillable = ['report_id','ques_id','report_heading', 'error_description', 'email', 'reply', 'reply_email'];

}
