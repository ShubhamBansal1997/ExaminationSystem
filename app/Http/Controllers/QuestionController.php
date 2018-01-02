<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Http\Requests;
use App\Questions;
use App\Questions_attempt;
use App\Chapters;
use App\Users;
//use Session;
class QuestionController extends Controller
{
    public function get_first_question()
    {
        Session::set('sub_id',1);
        Session::set('chap_id',1);
        Session::set('ques_cat','allques');
        Session::set('id',1);

        $sub_id = Session::get('sub_id');
        $chap_id = Session::get('chap_id');
        $ques_cat = Session::get('ques_cat');
        $id = Session::get('id');
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

        $id = 1;
        $ques = array();
        $questions = array();
        foreach($query as $i=>$question)
        {
            $ques["id"] = ++$i;
            $ques["ques_id"] = $question->id;
            $ques["sub_id"] = $question->sub_id;
            $ques["chap_id"] = $question->chap_id;
            $ques["ques_exp"] = $question->ques_exp;
            $ques["ques_ans1"] = $question->ques_ans1;
            $ques["ques_ans2"] = $question->ques_ans2;
            $ques["ques_ans3"] = $question->ques_ans3;
            $ques["ques_ans4"] = $question->ques_ans4;
            $ques["ques_ans"] = $question->ques_ans;
            $ques["ques_sol"] = $question->ques_sol;
            if($question->ques_level==1)
                $ques["ques_level"] = 'Easy';
            else if($question->ques_level==2)
                $ques["ques_level"] = 'Medium';
            else if($question->ques_level==3)
                $ques["ques_level"] = 'Difficult';
            $ques["ques_imp"] = $question->ques_imp;
            $ques["user_email"] = Session::get('email');
            $ques["ques_cat"] = Session::get('ques_cat');
            $ques["ques_input"] = null;


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
    public function question_page(Request $request)
    {

        $sub_id = $request->input('sub_id');
        $chap_id = $request->input('chap_id');
        $ques_cat = $request->input('ques_cat');
        $email = "shubhambansal17@hotmail.com";
        $query = Chapters::where('chap_id',$chap_id)->first();
        $chap_name = $query->chap_name;
        return view('pages.qpage',compact('sub_id','chap_id','ques_cat','email','chap_name'));

    }
    public function get_all_questions()
    {
        $data = array();
        $sub_id = 2;
        $chap_id = 60;
        $user_email = 'shubhambansal17@hotmail.com';
        $chap_name = Chapters::where('chap_id',$chap_id)->first();
        $chap_name = $chap_name->chap_name;
        $query = Questions::where('sub_id',$sub_id)
                            ->where('chap_id',$chap_id)
                            ->get();
        $user = Users::where('email',$user_email)->first();
        $i=0;
        foreach($query as $question)
        {
            $ques = array();
            $ques["s_no"] = $i;
            $i++;
            $ques["ques_id"] = $question->ques_id;
            if($question->o_id!=NULL)
                $ques["o_id"] = $question->o_id;
            else
                $ques["o_id"] = NULL;
            $ques["sub_id"] = $question->sub_id;
            $ques["chap_id"] = $question->chap_id;
            $ques["ques_exp"] = $question->ques_exp;
            $ques["ques_ans1"] = $question->ques_ans1;
            $ques["ques_ans2"] = $question->ques_ans2;
            $ques["ques_ans3"] = $question->ques_ans3;
            $ques["ques_ans4"] = $question->ques_ans4;
            $ques["ques_ans"] = $question->ques_ans;
            $ques["ques_sol"] = $question->ques_sol;
            $ques["ques_level"] = $question->ques_level;
            $ques["ques_imp"] = $question->ques_imp;
            $ques["ques_input"] = $question->ques_input;
            $ques["ques_cat"] = 'allques';
            $ques["user_id"] = $user->id;
            $ques["email"] = $user->email;
            $ques["mobile"] = $user->mobile;
            $attempt = Questions_attempt::where('ques_id',$question->ques_id)
                                        ->where('user_email',$user_email)
                                        ->first();
            if($attempt!=NULL)
            {
                $ques["ques_input"] = $attempt->ques_input;
            }
            else
            {
                $ques["ques_input"] = NULL;
            }
            array_push($data, $ques);
        }
        $response = [
          'data' => $data,
          'basic' => [
            'chap_name' => $chap_name,
            'subject' => 'Physics',
            'type' => 'Easy',
          ],
        ];
        return response()->json($response);


    }
    public function all_ques_pks()
    {
        $data = array();
        $sub_id = 2;
        $chap_id = 3;
        $query = Questions::where('sub_id',$sub_id)
                            ->where('chap_id',$chap_id)
                            ->get();
        foreach($query as $question){
            array_push($data, $question->ques_id);
        }
        $response = [
            'data' => $data
        ];
        return response()->json($response);
    }
    public function getsinglequestion(Request $request)
    {
        $ques_id = $request->input('ques_id');
        $email = $request->input('email');
        $question = Questions::where('ques_id', $ques_id)->first();
        $attempt = Questions_attempt::where('ques_id',$ques_id)
                                        ->where('user_email',$email)
                                        ->first();
        if($attempt!=NULL){
            $question["ques_input"] = $attempt->ques_input;
        }else{
            $question["ques_input"] = null;
        }
        $response = [
            'data' => $question
        ];
        return response()->json($response);

    }
    
}
