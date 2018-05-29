<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function thisIsUserObject()
    {
        return $this->belongsTo('App\User', 'user');
    }
    public function categoryObject()
    {
        return $this->belongsTo('App\Category', 'category');
    }
    public function cat(){

        //kai rysis many to many
        //visada bus belongsToMany
        return $this->belongsToMany('App\Category');
    }
    public function scopeCat1(){


        return $this->belongsToMany('App\Category');
    }
}
