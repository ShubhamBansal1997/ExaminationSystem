<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Expert_descrption extends Model
{
    public $timestamps='true';
    protected $table='expert_descrptions';
    protected $fillable = ['expert_id', 'profile_pic', 'benefit_percentage', 'availability', 'bank_account_number', 'bank_ifsc_code', 'bank_type', 'status', 'quote', 'preferred_language', 'charges','total_earned', 'amount_remaining', 'details' ];

    public function expert()
    {
      $this->hasOne('App\Expert','expert_id','id');
    }

}
