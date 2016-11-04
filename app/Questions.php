<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Questions extends Model
{
    protected $table = 'questions';
    protected $primaryKey = 'ques_id';
    protected $fillable = ['ques_id','o_id','sub_id','chap_id','ques_exp','ques_ans1','ques_ans2','ques_ans3','ques_ans4','ques_ans','ques_sol','ques_level','ques_imp'];
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
    public static function e_quesp($chap_id)
    {
    	$total = Questions::a_ques($chap_id);
    	$easy = Questions::e_ques($chap_id);
    	return ($easy/$total)*100;
    }
    public static function m_quesp($chap_id)
    {
    	$total =Questions::a_ques($chap_id);
    	$med = Questions::m_ques($chap_id);
    	return ($med/$total)*100;
    }
    public static function d_quesp($chap_id)
    {
    	$total = Questions::a_ques($chap_id);
    	$diff = Questions::d_ques($chap_id);
    	return ($diff/$total)*100;
    }
    public static function i_quesp($chap_id)
    {
    	$total = Questions::a_ques($chap_id);
    	$imp = Questions::i_ques($chap_id);
    	return ($imp/$total)*100;
    }

}
