<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title', 'text', 'time', 'p_img', 'category_id'
    ];

    protected $table = "posts";
}
