<?php

namespace App\Http\Controllers\market;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Session;
use App\Admins;
use App\Market;

class IndexController extends Controller
{
  public function index()
  {
    if(Session::get('market_status')==TRUE)
    {
      return view('market.home');
    }
  }


}
