<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;

use App\Http\Requests;
use App\Testseries;
use App\Timer;
use App\Chapters;
use App\Testseriesquestion;
use App\Questions;
use App\Testseriessubject;
use App\Questions_attempt;
use Illuminate\Support\Facades\Redirect;

class UserDashboardController extends Controller
{
   	public function home()
   	{

   		if(Session::get('Login_status')==TRUE)
           
            return view('pages.login');
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

      public function test_info($id)
      {
           $dur = Timer::where('id',1)->first();
      $duration = $dur->timer;
        Session::set('duration',$duration);
           Session::set('start_time',date("H:i:s"));
          $endTime =$endTime= date('H:i:s',strtotime('+'.Session::get('duration').'minutes',strtotime( Session::get('start_time'))));
         Session::set('end_time',$endTime);
         $test = Testseries::where('test_series_id',$id)->first();
         $testinfo = Testseriessubject::where('test_series_id',$id)->get();
           return view('pages.testinfo',compact('test','testinfo'));
      }
  public function test_page($test_id,$mock_test_id)
      {
      //   $dur = Timer::where('id',1)->first();
      // $duration = $dur->timer;
      //   Session::set('duration',$duration);
      //      Session::set('start_time',date("H:i:s"));
      //     $endTime =$endTime= date('H:i:s',strtotime('+'.Session::get('duration').'minutes',strtotime( Session::get('start_time'))));
      //    Session::set('end_time',$endTime);
        $email = Session::get('email');
        $testseries = Testseries::where('test_series_id',$test_id)->first();
        $data = Testseriesquestion::where('test_series_id',$test_id)->where('mock_test_id',$mock_test_id)->get();
   $subject = Testseriessubject::where('test_series_id',$test_id)->get();
 $i=0;

         return view('pages.qpagetest',compact('data','email','subject','test_id','mock_test_id','testseries','i'));
      }
      public function duration()
      {
$from_time1=date('H:i:s');
        
         $to_time1 = Session::get('end_time');

          $timefirst = strtotime($from_time1);
          $timesecond = strtotime($to_time1);
          $difference = $timesecond - $timefirst;
            // $msg=gmdate("H:i:s",$difference);
    $msg = "This is a simple message.";
      return response()->json(array('msg'=> gmdate("H:i:s",$difference)), 200);
      }
    public function getQues()
      {
 $id=$_GET['name'];
   
       $data = Testseriesquestion::where('id',$id)->first();
   $ques=   $data['ques_exp'];
   $ans1=   $data['ques_ans1'];
   $ans2=   $data['ques_ans2'];
   $ans3=   $data['ques_ans3'];
   $ans4=   $data['ques_ans4'];
$quesid=   $data['id'];
return response()->json(array('quesid'=>  $quesid,'ques'=>  $ques,'optionA'=>  $ans1,'optionB'=>  $ans2,'optionC'=>  $ans3,'optionD'=>  $ans4, 20000));
      }

}
