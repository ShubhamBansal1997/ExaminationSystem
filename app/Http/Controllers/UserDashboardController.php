<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Testseriesquestionattempt;
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
         session_start();
          $_SESSION['index'] = 0;
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
  public function test_page($test_id,$mock_test_id,$subject_id,$ques_id)
      {
      
        $email = Session::get('email');
        $testseries = Testseries::where('test_series_id',$test_id)->first();
        $data = Testseriesquestion::where('test_series_id',$test_id)->where('mock_test_id',$mock_test_id)->get();
   $subject = Testseriessubject::where('test_series_id',$test_id)->get();

 $review = Testseriesquestionattempt::where('email',$email)->get();
$unattempt = Testseriesquestionattempt::where('email',$email)->where('incorrect',1)->get();
         return view('pages.qpagetest',compact('unattempt','data','email','subject','test_id','mock_test_id','testseries','review'));
      }
 public function previous()
{
    session_start();
    $_SESSION['index']  =  $_SESSION['index'] -1;
  return Redirect::back();

}
public function next()
{
  session_start();
   $_SESSION['index']  =  $_SESSION['index'] +1;
    return Redirect::back();


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
    $email = Session::get('email');
       $data = Testseriesquestion::where('id',$id)->first();
   $ques=   $data['ques_exp'];
   $ans1=   $data['ques_ans1'];
   $ans2=   $data['ques_ans2'];
   $ans3=   $data['ques_ans3'];
   $ans4=   $data['ques_ans4'];
$quesid=   $data['id'];
 $ansatt = Testseriesquestionattempt::where('quesid',$id)->where('email', $email )->first();
$ansattempt = $ansatt['correct'];

$a = Testseriesquestionattempt::where('quesid',$id)->where('email', $email )->get();
if(count($a)<=0)
{
$seen = new Testseriesquestionattempt;
$seen->email= $email;
$seen->correct= 0;
$seen->incorrect= 1;
$seen->review= 0;
$seen->quesid= $id;
$seen->save();
}
else
{
  $a = Testseriesquestionattempt::where('quesid',$id)->where('email', $email )->first();
  $a->incorrect=1;
  $a->save();
}
return response()->json(array('attempt'=>$ansattempt,'quesid'=>  $quesid,'ques'=>  $ques,'optionA'=>  $ans1,'optionB'=>  $ans2,'optionC'=>  $ans3,'optionD'=>  $ans4, 20000));
      }
 public function markforreview()
 {



  $id=$_GET['name'];
  $email = Session::get('email');
  $quesid = $id;
    $data = Testseriesquestionattempt::where('quesid',$id)->where('email',$email)->get();
    if(count($data)<=0)
    {

    
  $data = new Testseriesquestionattempt;
  $data->email = $email;
  $data->review = 1;
  $data->quesid = $id;
   $data->correct = 0; 
   $data->incorrect = 0;
  $data->save();
}
else
{
   $data =  Testseriesquestionattempt::where('quesid',$quesid)->where('email',$email)->first();
  
  $data->review = 1;
  $data->save();
}
}
 public function submitAns()
 {



  $id=$_GET['name'];
  $ans= $_GET['data'];
  $email = Session::get('email');
  

/*$data2 = Testseriesquestionattempt::where('quesid',$id)->where('email',$email)->first();
     $data2->correct = $ans; 
     $data2->save();*/


$data2 = Testseriesquestionattempt::where('quesid',$id)->where('email',$email)->get();
if(count($data2)<=0 )
{
 $data2 = new Testseriesquestionattempt;
  $data2->email = $email;
  $data2->review = 0;
  $data2->quesid = $id;
   $data2->correct = $ans; 
   $data2->incorrect = 0;
  $data2->save();
}

  else
  {
$data2 = Testseriesquestionattempt::where('quesid',$id)->where('email',$email)->first();
     $data2->correct = $ans; 
     $data2->save();
}

 }
  public function unmarkforreview()
 {
  

  $id=$_GET['name'];
  $email = Session::get('email');
  $quesid = $id;
    $data = Testseriesquestionattempt::where('quesid',$id)->get();
    if(count($data)<=0)
    {

    
  $data = new Testseriesquestionattempt;
  $data->email = $email;
  $data->review = 0;
  $data->quesid = $id;
   $data->correct = 0; 
   $data->incorrect = 0;
  $data->save();
}
else
{
   $data =  Testseriesquestionattempt::where('quesid',$quesid)->first();
  
  $data->review = 0;
  $data->save();
}

 }
}
