<?php

namespace App;
use App\GalleryType;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
     public function galleryTypes(){
      return $this->belongsTo('App\GalleryType','gallery_type_id','id');
     }
     public function tourismPlaces()
     {
       return $this->belongsToMany('App\TourismPlace','tourism_image','image_id','tourism_place_id'); // assuming user_id and task_id as fk
     }
}
