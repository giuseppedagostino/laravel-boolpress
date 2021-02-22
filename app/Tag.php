<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{   
    // relazione many-to-many con il model post
    public function posts() {
        return $this->belongsToMany('App\Post');
    }
}
