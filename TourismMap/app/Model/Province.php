<?php
namespace App\Province;
use Illuminate\Database\Eloquent\Model;
class Province extends Model
{
     public function users(){
		  return $this->belongsTo('App\User','user_id','id');
	 }
}