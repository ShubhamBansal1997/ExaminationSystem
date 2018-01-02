<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Http\Requests;
use App\Chapters;
use App\Questions;
use App\Questions_attempt;
use Illuminate\Support\Facades\Redirect;

class UserDashboardController extends Controller
{
   	public function home()
   	{
   		if(Session::get('Login_status')==TRUE)
            return view('pages.home');
         else
            return redirect('login');
   	}
      public function ask_a_doubt(Request $request)
      {
         if(Session::get('Login_status')==true)
         {
            $this->validate($request, [
                'name' => 'required',
                'email' => 'required|email',
                'phoneno' => 'required|max:10|min:10',
                'doubt' => 'required'
                 ]);
            dd($request);
            //a mail function is goinng to be put here 
         }
         else
            return Redirect::back();
      }
   	public function chap_name($sub_id,$std)
   	{
   		if(Session::get('Login_status')==true)
   		{
   			$check = Chapters::where('sub_id',$sub_id)->where('std',$std)->count();
   			if($check)
	   			return view('pages.chap_name',compact('sub_id','std'));
	   		else
	   			return view('errors.503');
   		}
   		else
   		{
   			return redirect('login');
   		}
   	}
   	public function chap_page($sub_id,$std,$chap_id)
   	{
		$email = Session::get('email');
   		$check = Chapters::where('sub_id',$sub_id)
   						->where('std',$std)
   						->where('chap_id',$chap_id)
						->count();
		$allques = Questions::where('chap_id',$chap_id)
							->count();
		$easy = Questions::where('chap_id',$chap_id)
							->where('ques_level',1)
							->count();
		$medium = Questions::where('chap_id',$chap_id)
							->where('ques_level',2)
							->count();
		$diff = Questions::where('chap_id',$chap_id)
							->where('ques_level',3)
							->count();
		$imp = Questions::where('chap_id',$chap_id)
							->where('ques_imp',1)
							->count();
		$ar = Questions::where('chap_id',$chap_id)
							->where('ques_ar', 1)
							->count();
		$attempt = Questions_attempt::where('chap_id',$chap_id)
                          			->where('user_email',$email)
									  ->count();
									  
		$unattempt = $allques - $attempt;
		$correct = Questions_attempt::where('chap_id',$chap_id)
									->where('user_email',$email)
									->where('ques_status','correct')
									->count();
		$incorrect = Questions_attempt::where('chap_id',$chap_id)
										->where('user_email',$email)
										->where('ques_status','incorrect')
										->count();
		$data = [
			'allques' =>  $allques,
			'easy' => $easy,
			'medium' => $medium,
			'diff' => $diff,
			'imp' => $imp,
			'ar' => $ar,
			'attempt' => $attempt,
			'unattempt' => $unattempt,
			'correct' => $correct,
			'incorrect' => $incorrect
		];
   		if($check)
   			return view('pages.chap_details',compact('data','chap_id','sub_id'));
   		else
   			return view('errors.503');
   	}
   	public function askadoubt()
   	{
   		if(Session::get('Login_status')==true)
   		{
   			return view('pages.ask_a_doubt');
   			// ask a doubt feature needs to be made here
   		}
   	}
      public function packages($id)
      {
         dd($id);
         if($id==NULL)
         {
            return view('pages.pricingpage');
         }
         else
         {
            //dd("great");
            return view('pages.year1');
         }
      }

}
