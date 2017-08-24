<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
  public function roles(){
      return $this->belongsTo('App\UserRole', 'role_id', 'user_id');
   }
    public function permissions(){
      return $this->belongsToMany('App\Role', 'permission_role', 'role_id', 'user_id');
   }
}
