<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public function addLike($post_id)
    {
        $user_id = null;
        if (Auth::check()) {
            $user_id = Auth::id();
        }
        $ip = request()->getClientIp();
        $like = 1;
        Like::create([
            'like' => $like,
            'ip' => $ip,
            'user_id' => $user_id
         ]);

        $countPerPost = Like::all()->where('post_id')->count();
        return response()->json([
            'countPerPost' => $countPerPost,
        ]);
    }
}
