<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Post;
use Carbon\Carbon;
use http\Client\Curl\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Visitor;

class PostController extends Controller
{
    public function index(Request $request, $post_id) {

        $post = DB::table('posts')->where('id', $post_id)->first();
        $visitors = DB::table('visitors')->where('post_id', $post->id)->count();
        $author = DB::table('users')->where('id', $post->author_id)->first();
        $date = date_create($post->time);
        $date = Carbon::parse($date)->format('d-m-Y H:i:s');
        Visitor::visitorAdd($request, $post->id);
        return view('template.post', ['post' => $post, 'author' => $author, 'date' => $date, 'visitors' => $visitors]);
    }
}
