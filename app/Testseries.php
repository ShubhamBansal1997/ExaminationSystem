<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Testseries extends Model
{
    public $timestamps = True;
    protected $table = 'testseries';
    protected $fillable = 
    
    [
    'test_series_id',
    'test_series_name', 
    'num_of_mocktest',
    'Rules1',
    'Rules2',
    'Rules3',
    'Rules4',
    'Rules5',
    'Rules6',
    'Rules7',
    'Rules8',
    'Rules9',
    'Rules10'
    ];

}
