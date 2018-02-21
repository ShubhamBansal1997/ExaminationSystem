<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExpertSlot extends Model
{
    public $timestamps='true';
    protected $table='expert_slots';
    protected $fillable = ['expert_id', 'time'];
}
