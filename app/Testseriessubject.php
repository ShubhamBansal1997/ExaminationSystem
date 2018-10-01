<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Testseriessubject extends Model
{
    public $timestamps = True;
    protected $table = 'testseriessubject';
    protected $fillable = ['id','test_series_id', 'subject_name', 'number_of_ques','updated_at','created_at'];

}
