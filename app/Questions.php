<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Questions extends Model
{
    protected $table = 'questions';
    protected $fillable = ['ques_id','o_id','sub_id','chap_id','ques_exp','ques_ans1','ques_ans2','ques_ans3','ques_ans4','ques_ans','ques_sol','ques_level','ques_imp'];
}
