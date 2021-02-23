<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public $fillable = [
        'title',
        'slug',
        'subtitle',
        'author',
        'content',
        'publication_date',
    ];

    // relazione one-to-one con il model InfoPost
    public function infoPost() {
        return $this->hasOne('App\InfoPost');
    }

    // relazione one-to-many con il model Comment
    public function comments() {
        return $this->hasOne('App\Comment');
    }

    // relazione many-to-many con il model tag
    public function tags() {
        return $this->belongsToMany('App\Tag');
    }

    // relazione many-to-many con il model image
    public function imafes() {
        return $this->belongsToMany('App\Image');
    }
}
