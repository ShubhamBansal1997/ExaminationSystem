<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Expert extends Model
{
    public $timestamps = True;
    protected $table = 'experts';
    protected $fillable = [ 'first_name', 'last_name', 'phone', 'email', 'password', 'photo_of_expert', 'id_proof_number', 'id_proof_file', 'expert_benefit_percentage', 'tax_payment_gateway', 'duration', 'bank_account_number', 'bank_ifsc_code', 'type_of_account', 'timing_available', 'rank_in_various_exams', 'quote', 'preferred_language', 'amount_to_be_paid'];

}
