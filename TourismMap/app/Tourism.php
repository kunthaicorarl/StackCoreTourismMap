<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tourism extends Model
{   
    public function provinces()
    {
      return $this->belongsTo('App\Province'); // assuming user_id and task_id as fk
    }
    public function galleryTypes()
    {
      return $this->belongsToMany('App\GalleryType'); // assuming user_id and task_id as fk
    }
}
