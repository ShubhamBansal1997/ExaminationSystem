<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Questions;
use App\Testseriesquestion;
use App\Testseriessubject;

use App\Chapters;
use Illuminate\Support\Facades\Redirect;

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
    	if($request->ques_id==NULL)
        {
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
          $question->ques_ar = $request->ques_ar;
            $question->email =  Session::get('aemail');
        	$question->save();
        	Session::flash('flash_message', 'Your Question has been successfully added');
        }
        else
        {

            $question = Questions::where('ques_id',$request->ques_id)->first();
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
            $question->ques_ar = $request->ques_ar;
            $question->email =  Session::get('aemail');
            $question->save();
            Session::flash('flash_message', 'Your Question has been successfully edited');
        }
    	return redirect()->back();
    }
    public function viewquestion($sub_id,$std)
    {
    	return view('admin.pages.view_ques',compact('sub_id','std'));
    }

    public function viewquestionlist(Request $request)
    {

        if($request->ques_level=="NULL"&&$request->ques_imp=="NULL")
        {
            $questions = Questions::where('chap_id',$request->chap_id)
                        ->get();
        }
        else if($request->ques_level=="NULL"&&$request->ques_imp!="NULL")
        {
            $questions = Questions::where('chap_id',$request->chap_id)
                        ->where('ques_imp',$request->ques_imp)
                        ->get();
        }
        else if($request->ques_imp=="NULL"&&$request->ques_level!="NULL")
        {
            $questions = Questions::where('chap_id',$request->chap_id)
                        ->where('ques_level',$request->ques_level)
                        ->get();
        }
        else
        {
            $questions = Questions::where('chap_id',$request->chap_id)
                            ->where('ques_level',$request->ques_level)
                            ->where('ques_imp',$request->ques_imp)
                            ->get();

        }
                //dd($questions);
        $sub_id=$request->sub_id;
        $std=$request->std;
        return view('admin.pages.viewquestion',compact('questions','sub_id','std'));
    }

    public function editquestion($ques_id,$sub_id,$std)
    {
        $question = Questions::where('ques_id',$ques_id)->first();
        $chap = Chapters::where('chap_id',$question->chap_id)->first();
        $chap_id=$chap->chap_id;
        $chap_name=$chap->chap_name;
        return view('admin.pages.addeditquestion',compact('sub_id','std','question','chap_id','chap_name'));
    }
    public function deletequestion($ques_id,$sub_id,$std)
    {
        $question = Questions::where('ques_id',$ques_id)->first();
        $question->delete();
        \Session::flash('flash_message', 'Question Deleted');
        $route = 'admin/viewques/'. $sub_id . '/' . $std;
        return redirect($route);

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
    public function view_look($ques_id)
    {
        $question = Questions::where('ques_id',$ques_id)->first();
        return view('admin.pages.qpage',compact('question'));
    }
    public function view_look1($ques_id)
    {
        $question = Questions::where('ques_id',$ques_id)->first();
        return view('admin.pages.qpage1',compact('question'));
    }public function view_look2($ques_id)
    {
        $question = Questions::where('ques_id',$ques_id)->first();
        return view('admin.pages.qpage2',compact('question'));
    }
    public function addneetseries()
    {
        
        return view('admin.pages.addneetques');
    
    
}
    public function addaiimsseries()
    {
      
        return view('admin.pages.addaiimsques');
    
    
}
    public function addeamcetseries()
    {
        
        return view('admin.pages.addeamcetques');
    
    
}
  public function addeamcetques(Request $Request)
{
    $total = Testseriessubject:: where('test_series_id','3')->where('subject_name',$Request->subject_name)->first();
    $totalquestion = $total->number_of_ques;
    $validate = Testseriesquestion:: where('test_series_id','3')->where('mock_test_id',$Request->mock_test_id)->where('subject_name',$Request->subject_name)->get();
$i = 0;

foreach ($validate as $k) {
    $i++;
}
if($totalquestion==$i)
{
 Session::flash('flash_message', 'Maximum Number of question already present');
}
else
{

    $question = new Testseriesquestion;    
    $question->test_series_id =3;
    $question->subject_name = $Request->subject_name;
    $question->mock_test_id = $Request->mock_test_id;
    $question->ques_exp = $Request->ques_exp;
    $question->ques_ans1 = $Request->ques_ans1;
    $question->ques_ans2 = $Request->ques_ans2;
    $question->ques_ans3 = $Request->ques_ans3;
    $question->ques_ans4 = $Request->ques_ans4;
    $question->ques_ans = $Request->ques_ans;
    $question->ques_sol = $Request->ques_sol;
    $question->email = Session::get('aemail');
$question->save();
 Session::flash('flash_message', 'Your Question has been successfully added');

}
return Redirect::back();
}







  public function addaiimsques(Request $Request)
{
    $total = Testseriessubject:: where('test_series_id','2')->where('subject_name',$Request->subject_name)->first();
    $totalquestion = $total->number_of_ques;
    $validate = Testseriesquestion:: where('test_series_id','2')->where('mock_test_id',$Request->mock_test_id)->where('subject_name',$Request->subject_name)->get();
$i = 0;

foreach ($validate as $k) {
    $i++;
}
if($totalquestion==$i)
{
 Session::flash('flash_message', 'Maximum Number of question already present');
}
else
{

    $question = new Testseriesquestion;    
    $question->test_series_id =2;
    $question->subject_name = $Request->subject_name;
    $question->mock_test_id = $Request->mock_test_id;
    $question->ques_exp = $Request->ques_exp;
    $question->ques_ans1 = $Request->ques_ans1;
    $question->ques_ans2 = $Request->ques_ans2;
    $question->ques_ans3 = $Request->ques_ans3;
    $question->ques_ans4 = $Request->ques_ans4;
    $question->ques_ans = $Request->ques_ans;
    $question->ques_sol = $Request->ques_sol;
    $question->email = Session::get('aemail');
$question->save();
 Session::flash('flash_message', 'Your Question has been successfully added');

}
return Redirect::back();
}













  public function addneetques(Request $Request)
{
    $total = Testseriessubject:: where('test_series_id','1')->where('subject_name',$Request->subject_name)->first();
    $totalquestion = $total->number_of_ques;
    $validate = Testseriesquestion:: where('test_series_id','1')->where('mock_test_id',$Request->mock_test_id)->where('subject_name',$Request->subject_name)->get();
$i = 0;

foreach ($validate as $k) {
    $i++;
}
if($totalquestion==$i)
{
 Session::flash('flash_message', 'Maximum Number of question already present');
}
else
{

    $question = new Testseriesquestion;    
    $question->test_series_id =1;
    $question->subject_name = $Request->subject_name;
    $question->mock_test_id = $Request->mock_test_id;
    $question->ques_exp = $Request->ques_exp;
    $question->ques_ans1 = $Request->ques_ans1;
    $question->ques_ans2 = $Request->ques_ans2;
    $question->ques_ans3 = $Request->ques_ans3;
    $question->ques_ans4 = $Request->ques_ans4;
    $question->ques_ans = $Request->ques_ans;
    $question->ques_sol = $Request->ques_sol;
    $question->email = Session::get('aemail');
$question->save();
 Session::flash('flash_message', 'Your Question has been successfully added');

}
return Redirect::back();
}


    public function view_ques_test($id)
    {

        return view('admin.pages.view_ques_test',compact('id'));
    }
   public function viewquestest($id,Request $Request)
    {


        $data = Testseriesquestion::where('test_series_id',$id)->where('subject_name',$Request->subject_name)->where('mock_test_id',$Request->mock_test_id)->get();
return view('admin.pages.view_ques_test_series',compact('id','data'));
    }

  public function editquestiontest($ques_id)
    {
        $question = Testseriesquestion::where('id',$ques_id)->first();
        return view('admin.pages.addeditquestiontest',compact('question'));
    }
      public function updatequestiontest($ques_id,Request $Request)
    {
        $question = Testseriesquestion::where('id',$ques_id)->first();
$question->subject_name = $Request->subject_name;
$question->mock_test_id = $Request->mock_test_id;
$question->ques_exp = $Request->ques_exp;
$question->ques_ans1= $Request->ques_ans1;
$question->ques_ans2= $Request->ques_ans2;
$question->ques_ans3= $Request->ques_ans3;
$question->ques_ans4= $Request->ques_ans4;
$question->ques_ans= $Request->ques_ans;
$question->ques_sol= $Request->ques_sol;
$question->save();

        return Redirect::back();
    }
     public function deletequestest($ques_id)
    {
        $ques=Testseriesquestion::where('id',$ques_id)->first();
        $ques->delete();
         return Redirect::back();
    }
  public function view_look_test($ques_id)
    {
      $question = Testseriesquestion::where('id',$ques_id)->first();
 
        return view('admin.pages.qpage',compact('question'));
    }
    public function view_look_test1($ques_id)
    {
        $question = Testseriesquestion::where('id',$ques_id)->first();
 
        return view('admin.pages.qpage1',compact('question'));
    }public function view_look_test2($ques_id)
    {
        $question = Testseriesquestion::where('id',$ques_id)->first();
        return view('admin.pages.qpage2',compact('question'));
    }

}
