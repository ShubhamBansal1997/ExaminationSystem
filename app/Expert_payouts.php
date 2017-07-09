<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Expert_payouts extends Model
{
    public $timestamps='true';
    protected $table='experts_payouts';
    protected $fillable = ['payout_id', 'payout_amount', 'expert_id', 'payout_status', 'bank_account_number', 'bank_ifsc_code', 'bank_type', 'status' ];

    public function expert_descrption()
    {
      return $this->hasOne('App\Expert','expert_id','id');
    }
}
