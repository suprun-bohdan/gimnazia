<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title', 'text', 'time', 'p_img', 'tags', 'category_id', 'author_id'
    ];

    protected $table = "posts";
}
