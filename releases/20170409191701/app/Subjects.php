<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subjects extends Model
{
    protected $table = 'subjects';
	protected $fillable = ['sub_id','sub_name'];
}
