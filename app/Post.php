<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // relazione one-to-one con il model InfoPost
    public function infoPost() {
        return $this->hasOne('App\InfoPost');
    }

    // relazione one-to-many con il model Comment
    public function comments() {
        return $this->hasOne('App\Comment');
    }
}
