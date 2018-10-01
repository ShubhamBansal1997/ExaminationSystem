<?php

namespace App\Http\Controllers;
use App\Report;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
class ReportController extends Controller
{
     public function submit_report(Request $request)
    {
          $error = new Report;
        

        $error->ques_id = $request->myid;
        $error->report_heading = $request->heading;
        $error->error_description = $request->description;
      $error->email = Session::get('email');
 $error->reply = "null";
 $error->reply_email = "null";

        $error->save();

        return Redirect::back();


    }

 
}
