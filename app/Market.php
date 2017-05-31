<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Market extends Model
{
    protected $table = 'markets';
    protected $primaryKey = 'id';
    protected $fillable = ['id','email','fname','lname','max_discount','id_proof','bank_acc_no','bank_ifsc_code','phoneno','description','active','delete','comission','unpaid','total'];
    public $timestamps = true;

}
