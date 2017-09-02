<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TourismPlace extends Model
{
    
    public function provinces()
    {
      return $this->belongsTo('App\Province','province_id','id'); // assuming user_id and task_id as fk
    }
    public function galleryTypes()
    {
      return $this->belongsToMany('App\GalleryType','tourism_gallery','tourism_place_id','gallery_type_id'); // assuming user_id and task_id as fk
    }
    public function users()
    {
      return $this->belongsTo('App\User','user_id','id'); // assuming user_id and task_id as fk
    }
}
