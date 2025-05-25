<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Slider extends Model
{
    protected $fillable = [
        'title', 'preview_text', 'url', 'img_url'
    ];
}
