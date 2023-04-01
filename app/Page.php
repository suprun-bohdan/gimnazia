<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $primaryKey = 'page_id';
    protected $fillable = [
        'title', 'text', 'time', 'p_img'
    ];
}
