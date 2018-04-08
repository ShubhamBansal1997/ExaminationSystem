<?php

/**
 * @Author: Shubham Bansal
 * @Date:   2018-03-31 09:26:52
 * @Last Modified by:   Shubham Bansal
 * @Last Modified time: 2018-03-31 09:27:15
 */

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Lead;
use App\Admins;
use App\Market;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class LeadController extends Controller
{
    public function list_content()
    {
      $test = 2;
      return view('admin.pages.e_list',compact('test'));
    }
    public function list_market()
    {
      $test = 3;
      return view('admin.pages.e_list',compact('test'));
    }
    public function list_leads() {
      $leads = Lead::all();
      $markets = Market::all();;
      return view('admin.pages.list_lead', compact('leads', 'markets'));
    }
    public function add_market(Request $request) {
      //dd($request);
      $lead = Lead::where('id', $request->id)->first();
      $market = Market::where('id', $request->market_id)->first();
      $lead->market_id = $market->id;
      $lead->market_name = $market->fname;
      $lead->lead_status = 'ASSIGNED';
      $lead->save();

    }

    public function change_lead_status(Request $request) {
      $lead = Lead::where('id', $request->id)->first();
      $lead->lead_status = $request->status;
      $lead->save();
    }
}
