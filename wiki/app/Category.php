<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'category';

    public function post(){
        return $this->hasMany('App\Post', 'category');
    }
    public function post1(){

        //kai rysis many to many
        //visada bus belongsToMany
        return $this->belongsToMany('App\Post');
    }
    public function scopePost2(){

        //kai rysis many to many
        //visada bus belongsToMany
        return $this->belongsToMany('App\Post');
    }
}
