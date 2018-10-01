<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Expert;
use App\Expert_descrption;
use App\Expert_payouts;
use App\ExpertSlot;
use App\ExpertBooking;
use Validator;
use Illuminate\Support\Facades\Session;




class ExpertController extends Controller
{
    // here also...
    /** function to show the list expert page */
    public function list_experts()
    {
      $experts = Expert::all();

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

    /** function used to display the add or edit expert page */
    public function expert($id=null) {
      $expert = null;
      if($id!=null)
        $expert = Expert::where('id', $id)->first();
      return view('admin.pages.addeditexpert', compact('expert'));
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
          'profile_pic' => 'required|file',
        ]);
      $expert = new Expert;
      $expert->first_name = $request->input('first_name');
      $expert->last_name = $request->input('last_name');
      $expert->email_id = $request->input('email_id');
      $expert->phone_number = $request->input('phone_number');
      $expert->password = md5($request->input('password'));
      $expert->timings = $request->input('timings');
      $expert->id_proof_number = $request->id_proof_number;
      $expert->neet_rank = $request->neet_rank;
      $expert->aiims_rank = $request->aiims_rank;
      $expert->id_proof_file = $request->id_proof_number . '.' . $request->file('id_proof_file')->getClientOriginalName();
      $expert->profile_pic = $request->id_proof_number . '.' . $request->file('profile_pic')->getClientOriginalName();

      $request->file('profile_pic')->move(base_path() . '/public/images/profile_pic/', $expert->profile_pic);
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
      $expert->timings = $request->input('timings');
      $expert->status = true;

      if($request->input('password')!=NULL)
        $expert->password = md5($request->input('password'));

      if($request->file('id_proof_file')!=NULL)
      {
        $expert->id_proof_file = $request->id_proof_number . '.' . $request->file('id_proof_file')->getClientOriginalName();
        $request->file('id_proof_file')->move(base_path() . '/public/images/id_proof_expert/', $expert->id_proof_file);
      }
      if($request->file('profile_pic')!=NULL)
      {
        $expert->profile_pic = $request->id_proof_number . '.' . $request->file('profile_pic')->getClientOriginalName();
        $request->file('profile_pic')->move(base_path() . '/public/images/profile_pic/', $expert->profile_pic);
      }
      $status = $expert->save();
      return response()->json($status);
    }

    /**
     * [update_store_expert description]
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function update_store_expert(Request $request) {
      //dd($request);
      $expert = null;
      if($request->id == NULL) {
        $expert = new Expert;
      } else {
        $expert = Expert::where('id', $request->id)->first();
      }
      $expert->first_name = $request->first_name;
      $expert->last_name = $request->last_name;
      $expert->phone = $request->phone;
      $expert->email = $request->email;
      if($request->input('password')!=NULL)
        $expert->password = md5($request->input('password'));
      if($request->file('photo_of_expert')!=NULL)
      {
        $expert->photo_of_expert = $request->phone . '.' . $request->file('photo_of_expert')->getClientOriginalName();
        $request->file('photo_of_expert')->move(base_path() . '/public/images/', $expert->photo_of_expert);
      }
      if($request->file('id_proof_file')!=NULL)
      {
        $expert->id_proof_file = $request->phone . '.' . $request->file('id_proof_file')->getClientOriginalName();
        $request->file('id_proof_file')->move(base_path() . '/public/images/', $expert->id_proof_file);
      }

      $expert->id_proof_number = $request->id_proof_number;
      $expert->expert_benefit_percentage = $request->expert_benefit_percentage;
      $expert->tax_payment_gateway_charges = $request->tax_payment_gateway_charges;
      $expert->duration = $request->duration;
      $expert->bank_account_number = $request->bank_account_number;
      $expert->bank_ifsc_code = $request->bank_ifsc_code;
      $expert->type_of_account = $request->type_of_account;
      $expert->timing_available = $request->timing_available;
      $expert->rank_in_various_exams = $request->rank_in_various_exams;
      $expert->quote = $request->quote;
      $expert->preferred_language = $request->preferred_language;
      $expert->amount_to_be_paid = $request->amount_to_be_paid;
      $expert->timings = $request->timings;
      $expert->save();
      Session::flash('flash_message', 'Expert Data Updated!!');
      return redirect()->back();

    }

    /**
     * used in vue js api call to remove the expert
     * @param  integer $id expert_id
     * @return json     done
     */
    public function destroy_expert($id){
      $expert = Expert::where('id',$id)->first();
      $expert->status = false;
      $expert->delete();
       return redirect()->back();

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

    /** function to add the slot of the expert */
    public function addslot(Request $request) {
      $this->validate($request, [
          'expert_id' => 'required',
          'time' => 'required',
        ]);
      $expert = new ExpertSlot;
      $expert->expert_id = $request->input('expert_id');
      $expert->time = $request->input('time');
      $status = $expert->save();
      return response()->json($status);
    }

    /** function to delete the slot of the expert */
    public function deleteSlot($id) {
      $status = ExpertSlot::where('id', $id)->delete();
      return response()->json($status);
    }

    /** function to fetch the slots of the
    particular expert
     */
    public function fetchSlot($expert_id) {
      $slots = ExpertSlot::where('expert_id', $expert_id)->get();
      return response()->json($slots);
    }

    /**
     * function to update the
     * status of the expert
     */
    public function update_status($id) {
      $expert = Expert::where('id',$id)->first();
      $expert->status = ! $expert->status;
      $expert->save();
      return redirect()->back();
    }
   public function update_store_content()
   {
    echo("hv");
   }
}
