<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dish extends Model
{
    // Mass Assignment
    protected $fillable = [
        'name', 'restaurant_id', 'category', 'ingredients', 'description', 'path_img', 'price', 'gluten', 'available', 'slug'
    ];

    public function restaurants() {
        return $this->belongsTo('App\Restaurant');
    }

    public function orders() {
        return $this->belongsToMany('App\Order');
    }
}
