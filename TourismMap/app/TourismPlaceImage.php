<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TourismPlaceImage extends Model
{
    public function images(){
         $this->hasMany('App\Image','image_id','id');
    }
}
