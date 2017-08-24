<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    public function permissions(){
      return $this->belongsToMany('App\User', 'permission_role', 'user_id', 'role_id');
   }
}
