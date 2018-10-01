<?php

namespace App\Http\Controllers\admin;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;



use Session;
use Intervention\Image\ImageManagerStatic as Image;
use App\Content;



class ContentWritterController extends Controller
{
    /** function to display the list of the not deleted marketing users */
    public function index()
    {
      $val = 0;
      $content = Content::where('delete',$val)->get();
      return view('admin.pages.contentwritter', compact('content'));
    }
    /** to add marketing user to the database */
    public function adduser(Request $request)
    {
      $sectiondata = "";
     foreach($request->section as $data)
     {
        $sectiondata = $sectiondata.$data.",";
     }



     $this->validate($request, [
        'email' => 'required',
        'password' => 'required',
        'fname' => 'required',
        'lname' => 'required',
        'section' => 'required',
        'id_proof' => 'required',
        'id_proof_file' => 'required'
        ]);
      $user = new Content;
      //dd($request);
      $user->fname = $request->fname;
      $user->lname = $request->lname;
      $user->phone = $request->phone;
      $user->email = $request->email;
      $user->password = md5($request->password);
      
   
      if($request->file('profile_pic')!=NULL){
        $user->profile_pic = $request->profile_pic . '.' . $request->file('profile_pic');
        $request->file('profile_pic')->move(base_path() . '/public/images/market/', $user->profile_pic);
      }
      $user->id_proof = $request->id_proof;
         //dd($request->file('id_proof_file'));
      $user->id_proof_file = $request->id_proof . '.' . $request->file('id_proof_file');
      $request->file('id_proof_file')->move(base_path() . '/public/images/id_proof/', $user->id_proof_file);
$user->section = $sectiondata;
     $user->status = 1;$user->delete = 0;
    
    
     
      
      $user->save();
      return Redirect::back();

    }


    /** delete user */
    public function deletecontentwritter($Sno)
    {
      $user = Content::where('id',$Sno)->first();
      $user->status = false;
      $user->delete = true;
      $user->save();
      $msg = array(
        'status' => 'success',
        'msg' => 'Marketing user deleted successfully'
         );
     return Redirect::back();
    }

    /** change the status of the user */
    public function changestatuscontent($Sno)
    {

      $user = Content::where('id',$Sno)->first();
      if($user->status==false){
        $user->status=true;
      }else{
        $user->status=false;
      }
      $user->save();
      $msg = array(
        'status' => 'success',
        'msg' => 'Status Changed Succesfully' );
       return Redirect::back();
    }


  public function editcontentwritter($id)
    {
      $content = null;
      if($id!=null)
        $content = Content::where('id', $id)->first();

return view("admin/pages/addeditcontentwriter", compact('content'));
    }





 public function editcontent(Request $request,$id)
    {
              $sectiondata = "";
     foreach($request->section as $data)
     {
        $sectiondata = $sectiondata.$data.",";
     }

       $user = Content::where('id',$request->id)->first();



    
     //dd($request);
      $user->fname = $request->fname;
      $user->lname = $request->lname;
      $user->phone = $request->phone;
      $user->email = $request->email;
      $user->password = md5($request->password);
      
   
      if($request->file('profile_pic')!=NULL){
        $user->profile_pic = $request->profile_pic . '.' . $request->file('profile_pic');
        $request->file('profile_pic')->move(base_path() . '/public/images/market/', $user->profile_pic);
      }
      $user->id_proof = $request->id_proof;
         //dd($request->file('id_proof_file'));
      $user->id_proof_file = $request->id_proof . '.' . $request->file('id_proof_file');
      /*$request->file('id_proof_file')->move(base_path() . '/public/images/id_proof/', $user->id_proof_file);*/
$user->section = $sectiondata;
     $user->status = 1;$user->delete = 0;
    
    
     
   
      $user->save();
      return Redirect::back();

    }
  

}
