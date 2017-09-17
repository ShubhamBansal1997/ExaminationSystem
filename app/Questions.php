<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Questions extends Model
{
    protected $table = 'questions';
    protected $primaryKey = 'ques_id';
    protected $fillable = ['ques_id','o_id','sub_id','chap_id','ques_exp','ques_ans1','ques_ans2','ques_ans3','ques_ans4','ques_ans','ques_sol','ques_level','ques_imp','ques_ar'];
    public $timestamps = false;

    public static function a_ques($chap_id)
    {
    	return Questions::where('chap_id',$chap_id)->count();
    }
    public static function e_ques($chap_id)
    {
    	return Questions::where('chap_id',$chap_id)->where('ques_level',1)->count();
    }
    public static function m_ques($chap_id)
    {
    	return Questions::where('chap_id',$chap_id)->where('ques_level',2)->count();
    }
    public static function d_ques($chap_id)
    {
    	return Questions::where('chap_id',$chap_id)->where('ques_level',3)->count();
    }
    public static function i_ques($chap_id)
    {
    	return Questions::where('chap_id',$chap_id)->where('ques_imp',1)->count();
    }
    public function question_attempt()
    {
        return $this->hasMany('App\Questions_attempt','ques_id','ques_id');
    }
    public static function ar_ques($chap_id)
    {
      return Questions::where('chap_id', $chap_id)->where('ques_ar',1)->count();
    }


}
