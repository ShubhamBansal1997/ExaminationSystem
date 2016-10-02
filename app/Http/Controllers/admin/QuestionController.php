<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Session;

class QuestionController extends Controller
{
    public function addquestion(Request $request)
    {
    	public function question($sub_id,$chap_id)
    	{
    		return view('admin.addeditquestion',compact('sub_id','chap_id'));
    	}
    }
}
