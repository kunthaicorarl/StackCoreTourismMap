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
}
