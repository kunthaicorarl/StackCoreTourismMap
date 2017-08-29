<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
     public function provinces(){
		return $this->belongsToMany('App\Province', 'province_image_details', 'image_id', 'province_id');
	 }
}
