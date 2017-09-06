<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tourism extends Model
{   
    public function provinces()
    {
      return $this->belongsTo('App\Province'); // assuming user_id and task_id as fk
    }
    public function galleryType()
    {
      return $this->belongsToMany('App\GalleryType', 'tourism_gallery'); // assuming user_id and task_id as fk
    }
}
