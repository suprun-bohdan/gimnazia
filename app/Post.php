<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Post extends Model
{
    protected $fillable = [
        'title', 'text', 'time', 'p_img', 'tags', 'category_id', 'author_id', 'description'
    ];

    protected $table = "posts";

    public static function getLastNews($limit)
    {
        $news = DB::table('posts')->orderBy('created_at', 'desc')->limit($limit);
        return $news;
    }
}
