<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Market_Payout;
class Market_Payout extends Model
{
    protected $table = 'market_payouts';
    protected $primaryKey = 'id';
    protected $fillable = ['id','name','email','amount','type','bank_ifsc_code','bank_acc_no','phoneno','active'];


}
