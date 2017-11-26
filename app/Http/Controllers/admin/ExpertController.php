<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Expert;
use App\Expert_descrption;
use App\Expert_payouts;
use Validator;



class ExpertController extends Controller
{
    // here also...
    /** function to show the list expert page */
    public function list_experts()
    {
      $experts = Expert::where('status',true)->get();

      return view('admin.pages.list_experts',compact('experts'));
    }


    /**
     * Get the list of a the experts basic data
     */
    public function index_experts($id)
    {
      $response = Expert::where('status',true)
                        ->where('id',$id)
                        ->first();


      return response()->json($response);
    }

    /** used in vue js as api call to store expert details */
    public function store_expert(Request $request)
    {
      $this->validate($request, [
          'first_name' => 'required',
          'phone_number' => 'required|max:10',
          'email_id' => 'required|unique:experts',
          'password' => 'required',
          'id_proof_number' => 'required',
          'id_proof_file' => 'required|file',
        ]);
      $expert = new Expert;
      $expert->first_name = $request->input('first_name');
      $expert->last_name = $request->input('last_name');
      $expert->email_id = $request->input('email_id');
      $expert->phone_number = $request->input('phone_number');
      $expert->password = md5($request->input('password'));
      $expert->id_proof_number = $request->id_proof_number;
      $expert->neet_rank = $request->neet_rank;
      $expert->aiims_rank = $request->aiims_rank;
      $expert->id_proof_file = $request->id_proof_number . '.' . $request->file('id_proof_file')->getClientOriginalName();
      $request->file('id_proof_file')->move(base_path() . '/public/images/id_proof_expert/', $expert->id_proof_file);
      $expert->status = true;
      $status = $expert->save();
      return response()->json($status);
    }

    /** used in the vue js api call to update the expert basic details
     */
    public function update_expert(Request $request,$id)
    {
      $expert = Expert::where('id',$id)->first();
      $expert->first_name = $request->input('first_name');
      $expert->last_name = $request->input('last_name');
      $expert->email_id = $request->input('email_id');
      $expert->id_proof_number = $request->input('id_proof_number');
      $expert->neet_rank = $request->input('neet_rank');
      $expert->aiims_rank = $request->input('aiims_rank');
      $expert->status = true;

      if($request->input('password')!=NULL)
        $expert->password = md5($request->input('password'));

      if($request->file('id_proof_file')!=NULL)
      {
        $expert->id_proof_file = $request->id_proof_number . '.' . $request->file('id_proof_file')->getClientOriginalName();
        $request->file('id_proof_file')->move(base_path() . '/public/images/id_proof_expert/', $expert->id_proof_file);
      }
      $status = $expert->save();
      return response()->json($status);
    }

    /**
     * used in vue js api call to remove the expert
     * @param  integer $id expert_id
     * @return json     done
     */
    public function destroy_expert($id){
      $expert = Expert::where('id',$id)->first();
      $expert->status = false;
      $expert->save();
      return response()->json(['done']);

    }
    /** function to show the page of descrptions of the experts */
    public function list_expert_descrption()
    {
      $expert_descrption = Expert_descrption::where('status', true)->get();
      return view('admin.pages.list_expert_descrption',compact('expert_descrption'));
    }

    /**
     * vue js to store the expert descrption
     */
    public function store_descrption(Request $request)
    {
      $reques = $request->all();
      return response()->json($reques);
    }

    /** function to show the page of the  list of all expert payouts*/
    public function list_expert_payouts()
    {
      return view('admin.pages.list_expert_payouts');
    }
}
