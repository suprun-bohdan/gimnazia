<?php

namespace App;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{
    //
    protected $table = "visitors";

    protected $fillable = [
        'visitor', 'post_id', 'ip'
    ];

    public static function visitorAdd(Request $request, $post_id) {
        $visitor = 1;
        Visitor::create([
            'post_id' => $post_id,
            'visitor' => $visitor,
            'ip' => $request->ip()
        ]);
    }
}
