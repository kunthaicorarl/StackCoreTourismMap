<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TourismPlace extends Model
{
    
    public function provinces()
    {
      return $this->belongsTo('App\Province','province_id','id'); // assuming user_id and task_id as fk
    }
    public function images()
    {
      return $this->belongsToMany('App\Image','tourism_image','tourism_place_id','image_id'); // assuming user_id and task_id as fk
    }
    public function users()
    {
      return $this->belongsTo('App\User','user_id','id'); // assuming user_id and task_id as fk
    }
}
