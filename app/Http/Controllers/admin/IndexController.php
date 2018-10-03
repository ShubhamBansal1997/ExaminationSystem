<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Session;
use App\Admins;
use App\Testseriessubject;

class IndexController extends Controller
{
    public function index()
    {
    	if(Session::get('admin_status')==TRUE)
    		return redirect('admin/home');
    	else
    		return view("admin.index");
    }
    public function postLogin(Request $request)
    {
	    if(Session::get('admin_status')==TRUE)
           return redirect('admin/home');
        else
        {
              $this->validate($request, [
                'email' => 'required|email',
                'password' => 'required'
                 ]);
            $email = $request->email;
            $password = $request->password;
            $password = md5($password);
            //dd($password);
            //dd($password);
            $query = Admins::where('email',$email)->where('password',$password)->where('a_status','1');
            if($query->count()>=1)
            {
                $query= $query->get();
                foreach($query as $data)
                {
                    $email = $data->email;
                    $a_status = $data->a_status;
                }
                Session::set('admin_status',TRUE);
                Session::set('aemail',$email);
                Session::set('a_status',$a_status);
                return redirect('admin');
            }
            else
            {
                Session::flash('flash_message', 'Your Email or password is incorrect');
                return view('admin.index');
            }
        }
    }
    public function logout()
    {
        Session::flush();
        Session::flash('flash_message', 'You have been successfully Logout');
        return redirect('admin');
    }
    public function defineneet()
    {
        $val= 1;
        $subject = Testseriessubject::where('test_series_id',$val)->get();
     
        return view("admin.pages.definetestseriesneet", compact('subject'));
        
  
    }
      public function defineaiims()
    {
             $val= 2;
        $subject = Testseriessubject::where('test_series_id',$val)->get();
     
        
        return view("admin.pages.definetestseriesaiims", compact('subject'));
        
  
    }
      public function defineeamcet()
    {
                 $val= 3;
        $subject = Testseriessubject::where('test_series_id',$val)->get();
     
        
        
        return view("admin.pages.definetestserieseamcet", compact('subject'));
        
  
    }
     
     public function updateneet(Request $request)
    {

        $subject = new Testseriessubject;
        $subject->subject_name = $request->subject1;
        $subject->number_of_ques = $request->number1;
        $subject->num_of_mocktest = $request->number2;

        $subject->test_series_id = 1;
        $subject->save();
         $val= 1;
        $sub = Testseries::where('test_series_id',$val)->get();
     $sub->num_of_mocktest = $request->number2;
$sub->save();
             return Redirect::back();  

    }
    public function updateaiims(Request $request)
    {
        $subject = new Testseriessubject;
        $subject->subject_name = $request->subject1;
        $subject->number_of_ques = $request->number1;
        $subject->num_of_mocktest = $request->number2;

        $subject->test_series_id = 2;
        $subject->save();
               return Redirect::back();  
        

    }
    public function updateeamcet(Request $request)
    {
        $subject = new Testseriessubject;
        $subject->subject_name = $request->subject1;
        $subject->number_of_ques = $request->number1;
        $subject->num_of_mocktest = $request->number2;

        $subject->test_series_id = 3;
        $subject->save();

           return Redirect::back();  
    }
        public function deletesubject($id)
    {
        $subject =  Testseriessubject::where('id', $id)->delete();
       

           return Redirect::back();  
    }
            public function editsubject($id)
    {
        $subject =  Testseriessubject::where('id', $id)->first();
        return view("admin/pages/editsubject", compact('subject'));
        

         
    }
    public function updatesubject(Request $request,$id)
    {

        $subject = Testseriessubject::where('id',$id)->first();

       
        $subject->subject_name = $request->subject1;
        $subject->number_of_ques = $request->number1;

         

       $subject->save();

    
          return Redirect::back();  
    }
    
    
    
}
