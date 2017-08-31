<?php

namespace App;
use App\GalleryType;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
     public function galleryTypes(){
      return $this->belongsTo('App\GalleryType','gallery_type_id','id');
     }
}
