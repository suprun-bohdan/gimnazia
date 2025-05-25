<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    protected $fillable = [
        'like', 'post_id', 'ip', 'user_id', 'sessid'
    ];
}
