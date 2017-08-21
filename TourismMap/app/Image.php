<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    public function provinces(){
		return $this->belongsToMany('App\Province');
     }
}
