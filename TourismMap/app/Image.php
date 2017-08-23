<?php

namespace App;
use App\GalleryType;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    public function provinces(){
		return $this->belongsToMany('App\Province');
     }
     public function galleryTypes(){
      return $this->belongsTo(GalleryType::class);

     }
}
