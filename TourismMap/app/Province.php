<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Province extends Model
{
     public function users(){
		  return $this->belongsTo('App\User','user_id','id');
	 }
	 public function images(){
		return $this->belongsToMany('App\Image');
     }
}
