<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserRole extends Model
{
    public function users(){
        return $this->hasMany('App\User','user_id','id');
    }
    public function roles(){
        return $this->hasMany('App\Role','role_id','id');
    }
}
