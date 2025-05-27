<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $table = 'pages';
    protected $primaryKey = 'page_id';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'title', 'text', 'time', 'p_img', 'files'
    ];

    public function getKeyName(): string
    {
        return 'page_id';
    }
}
