<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Image;
class GalleryType extends Model
{
    public function images(){
        return $this->hasMany(Image::class);
    }
}
