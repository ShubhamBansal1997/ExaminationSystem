<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    public $timestamps = True;
    protected $table = 'content';
    protected $fillable = ['Sno','fname', 'lname', 'phone', 'email', 'password', 'profile_pic', 'id_proof', 'id_proof_file', 'section','status','delete'];

}
