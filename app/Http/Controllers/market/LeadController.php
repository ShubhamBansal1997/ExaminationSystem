<?php

/**
 * @Author: Shubham Bansal
 * @Date:   2018-03-31 09:26:52
 * @Last Modified by:   Shubham Bansal
 * @Last Modified time: 2018-03-31 09:27:15
 */

namespace App\Http\Controllers\market;

use Illuminate\Http\Request;
use App\Lead;
use App\Admins;
use App\Market;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Session;

class LeadController extends Controller
{
    public function list_leads() {
        //dd(Session::all());
      $memail = Session::get('memail');
      $market = Market::where('email', $memail)->first();
      //dd($market);
      $leads = Lead::where('market_id', $market->id)->get();
      //$markets = Market::all();;
      return view('market.list_lead', compact('leads', 'markets'));
    }
    public function change_lead_status(Request $request) {
      $lead = Lead::where('id', $request->id)->first();
      $lead->lead_status = $request->status;
      $lead->save();
    }
}
