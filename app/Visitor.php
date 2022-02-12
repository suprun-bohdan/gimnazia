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
        $check = Visitor::where('sessid', $request->sess_id)->first();
        if ($check == null) :
        Visitor::create([
            'post_id' => $post_id,
            'visitor' => $visitor,
            'ip' => $request->ip(),
            'sessid' => $request->session()->get('key')
        ]);
        endif;
    }
}
