<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Questions;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Session;
use Intervention\Image\ImageManagerStatic as Image;

class QuestionController extends Controller
{
    
    public function question($sub_id,$std)
    {
    	return view('admin.pages.addeditquestion',compact('sub_id','std'));
    }
    public function addquestion(Request $request)
    {
    	$this->validate($request, [
                'chap_id' => 'required',
                'ques_exp' => 'required',
                'ques_ans1' => 'required',
                'ques_ans2' => 'required',
                'ques_ans3' => 'required',
                'ques_ans4' => 'required',
                'ques_sol' => 'required',
                'ques_imp' =>'required',
                'sub_id' => 'required',
                ]);
    	$question = new Questions;
    	$question->chap_id = $request->chap_id;
    	$question->sub_id = $request->sub_id;
    	$question->ques_exp = $request->ques_exp;
    	$question->ques_ans1 = $request->ques_ans1;
    	$question->ques_ans2 = $request->ques_ans2;
    	$question->ques_ans3 = $request->ques_ans3;
    	$question->ques_ans4 = $request->ques_ans4;
    	$question->ques_ans = $request->ques_ans;
    	$question->ques_sol = $request->ques_sol;
    	$question->ques_imp = $request->ques_imp;
    	$question->ques_level = $request->ques_level;
    	$question->save();
    	Session::flash('flash_message', 'Your Question has been successfully added');
    	return redirect()->back();
    }
    public function viewquestion($sub_id,$std)
    {
    	return view('admin.pages.view_ques',compact('sub_id','std')); 
    }

    public function viewquestionlist(Request $request)
    {
        $questions = Questions::where('chap_id',$request->chap_id)
                            ->where('ques_level',$request->ques_level)
                            ->where('ques_imp',$request->ques_imp)
                            ->get();
        //dd($questions);
        return view('admin.pages.viewquestion',compact('questions'));
    }
    public function upload_image(ImageRequest $request)
	{
	    if($request->hasFile('image')){
	        $filename = str_random(20).'_'.$request->file('image')->getClientOriginalName();
	        $image_path = base_path() . '/public/images/thread/';
	        $request->file('image')->move(
	            $image_path, $filename
	        );
	        echo $filename;    
	    }
	    else{
	        echo 'Oh No! Uploading your image has failed.';
	    }
	}
    
}
