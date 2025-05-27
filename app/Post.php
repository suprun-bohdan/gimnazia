<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\DB;

class Post extends Model
{
    protected $fillable = [
        'title', 'text', 'time', 'p_img', 'tags', 'category_id', 'author_id', 'description'
    ];

    protected $table = "posts";

    public static function getLastNews($limit)
    {
        return Post::orderBy('created_at', 'desc')->paginate($limit);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'author_id');
    }
}
