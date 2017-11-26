<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Expert extends Model
{
    public $timestamps='true';
    protected $table='experts';
    protected $fillable = ['first_name', 'last_name', 'phone_number', 'email_id', 'password', 'id_proof_number', 'id_proof_file', 'neet_rank', 'aiims_rank' ];

    public function expert_descrption()
    {
      return $this->hasOne('App\Expert_descrption','id','expert_id');
    }
}
