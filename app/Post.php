<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public $fillable = [
        'title',
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
}
