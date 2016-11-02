<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Questions;
use App\Questions_attempt;

class QuestionController extends Controller
{
    public function get_question(Request $request)
    {
    	$sub_id = $request->sub_id;
    	$chap_id = $request->chap_id;
    	$ques_cat = $request->ques_cat;
    	if($ques_cat!='imp')
        {
            if($ques_cat=='allques')
            {
                $query = Questions::where('sub_id',$sub_id)
                			->where('chap_id',$chap_id)
                            ->get();
            }
            
            else
            {
                if($ques_cat='easy')
                        $ques_level = 1;
                else if($ques_cat=='medium')
                        $ques_level = 2;
                else if($ques_level=='difficult')
                        $ques_level = 3;
                $query = Questions::where('sub_id',$sub_id)
                			->where('chap_id',$chap_id)
                            ->where('ques_level',$ques_level)
                            ->get();
            }
        }
        else
        {
            $query = Questions::where('sub_id',$sub_id)
                			->where('chap_id',$chap_id)
                            ->where('ques_imp',$ques_imp)
                            ->get();
        }
        return response()->json($query);


    }

    public function ques_prev_sub(Request $request)
    {
	    $sub_id = $request->sub_id;
    	$chap_id = $request->chap_id;
    	$ques_cat = $request->ques_cat;
    	$email = $request->user_email;
    	$ques_id = $request->ques_id;

    	$query = Questions_attempt::where('ques_id',$ques_id)
                                ->where('user_email',$email)
                                ->first();
		//dd($query);
        if($query!=NULL)
        {
            
            $data = array(
                'ques_attempt' => TRUE,
                'ques_status' => $query->ques_status,
                'ques_input' => $query->ques_input
            );
            
            
        }
        else
        {
            $data = array(
                'ques_attempt' => FALSE,
            );
            
        }	                        
		return response()->json($data);
    }

    public function submit_question(Request $request)
    {
    	$sub_id = $request->sub_id;
    	$chap_id = $request->chap_id;
    	$ques_cat = $request->ques_cat;
    	$user_email = $request->user_email;
    	$ques_id = $request->ques_id;
    	$ques_input = $request->ques_input;
    	$ques_status = $request->ques_status;

    	$ques_attempt = new Questions_attempt;
    	$ques_attempt->ques_id = $ques_id;
    	$ques_attempt->ques_status= $ques_status;
    	$ques_attempt->user_email = $user_email;
    	$ques_attempt->sub_id = $sub_id;
    	$ques_attempt->chap_id = $chap_id;
    	$ques_attempt->ques_cat = $ques_cat;
    	$ques_attempt->ques_input = $ques_input;
    	$ques_attempt->save();
    	
    	return response()->json(TRUE);


    }
    public function unattempt_question($sub_id,$chap_id,$email)
    {
    	$query = Questions::join('questions_attempt','questions_attempt.ques_id!=questions.ques_id')
                          ->where('questions.sub_id',$sub_id)
                          ->where('questions.chap_id',$chap_id)
                          ->where('question_attempt.user_email',$email)
                          ->get();
    	return response()->json($query);
    }
    public function incorrect_question($sub_id,$chap_id,$email)
    {
        $query = Questions::join('questions_attempt','questions_attempt.ques_id=questions.ques_id')
                          ->where('questions.sub_id',$sub_id)
                          ->where('questions.chap_id',$chap_id)
                          ->where('questions_attempt.user_email',$email)
                          ->where('ques_status','incorrect')
                          ->get();
        return response()->json($query);
    } 
}
