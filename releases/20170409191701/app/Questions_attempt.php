<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Session;
class Questions_attempt extends Model
{
    protected $table = 'questions_attempt';
    protected $fillable = [ 'ques_id','ques_status','user_email','sub_id','chap_id','ques_cat','ques_input' ];
    public $timestamps = false;

    public function questions()
    {
    	return $this->belongsTo('App\Questions','ques_id','ques_id');
    }
    public static function attempted($chap_id)
    {
    	$email = Session::get('email');
    	return Questions_attempt::where('chap_id',$chap_id)->where('user_email',$email)->count();
    }
    public static function correct($chap_id)
    {
    	$email = Session::get('email');
    	return Questions_attempt::where('chap_id',$chap_id)->where('ques_status','correct')->where('user_email',$email)->count();
    }
    public static function incorrect($chap_id)
    {
    	$email = Session::get('email');
    	return Questions_attempt::where('chap_id',$chap_id)->where('ques_status','incorrect')->where('user_email',$email)->count();
    }
}
