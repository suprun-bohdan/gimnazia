<?php

namespace App;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{
    //
    protected $table = "visitors";

    protected $fillable = [
        'visitor', 'post_id', 'ip', 'sessid'
    ];

    public static function visitorAdd(Request $request, $post_id) {
        $visitor = 1;
        $checkLike = Visitor::where('sessid', $request->sess_id)->first();
        $checkPost = Visitor::where('post_id', $request->post_id)->first();
        if ($checkLike == null or $checkPost == null) :
        Visitor::create([
            'post_id' => $post_id,
            'visitor' => $visitor,
            'ip' => $request->ip(),
            'sessid' => $request->session()->get('key')
        ]);
        endif;
    }
}
