<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Image;
class GalleryType extends Model
{   
    public function users(){
        return $this->belongsTo('App\User','user_id','id');
   }
    public function images(){
        return $this->hasMany('App\Image','image_id','id');
    }
    public function tourisms()
    {
        return $this->belongsToMany('App\TourismPlace','tourism_gallery','tourism_place_id','gallery_type_id');  // assuming user_id and task_id as fk
    }
}
