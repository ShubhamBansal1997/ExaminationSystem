<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Testseriesquestion extends Model
{
    public $timestamps = True;
    protected $table = 'testseriesquestion';
    protected $fillable = ['id','test_series_id', 'subject_name', 'mock_test_id', 'ques_exp', 'ques_ans1', 'ques_ans2', 'ques_ans3', 'ques_ans4', 'ques_ans1','ques_sol','created_at','updated_at','ques_ar','email'];

}
