<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chapters extends Model
{
    protected $table = 'chapters';
    protected $fillable = [ 'chap_id' , 'sub_id' , 'std' , 'chap_name' ];

    public static function chap_name($chap_id)
    {
    	$query = Chapters::where('chap_id',$chap_id)->first();
    	return $query->chap_name;
    } 
}
