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
	 public function tourism()
	 {
	   return $this->hasMany('App\TourismPlace'); // assuming user_id and task_id as fk
	 }
}
