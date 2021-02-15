<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{

    public function types() {
        return $this->belongsToMany('App\Type');
    }

      public function dishes() {
        return $this->hasMany('App\Dish');
    }
}
