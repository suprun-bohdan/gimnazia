<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        return view('template.index');
    }

    public function news()
    {
        $posts = Post::paginate(12);
        return view('template.news', ['posts' => $posts]);
    }
}
