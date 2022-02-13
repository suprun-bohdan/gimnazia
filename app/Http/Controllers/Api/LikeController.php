<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public function addLike(Request $request)
    {
        $user_id = $request->user_id;
        if (Auth::check()) {
            $user_id = Auth::id();
        }
        $ip = request()->getClientIp();
        $like = 1;
        $checkLike = Like::where('sessid', $request->sess_id)->first();
        $checkPost = Like::where('post_id', $request->post_id)->first();
        $countPerPost = Like::all()->where('post_id')->count();
        if ($checkLike == null or $checkPost === null) {
            Like::create([
                'like' => $like,
                'ip' => $ip,
                'user_id' => $user_id,
                'post_id' => $request->post_id,
                'sessid' => $request->sess_id,
            ]);

            $countPerPost = Like::all()->where('post_id')->count();
            return response()->json([
                'countPerPost' => $countPerPost,
            ]);
        }
        else {
            $info = [
                'alert' => 'Like from ' . $request->sess_id . ' isset',
                'count' => $countPerPost,
            ];
            return response()->json($info, 400);
        }

    }
}
