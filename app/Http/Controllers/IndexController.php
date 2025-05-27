<?php

namespace App\Http\Controllers;

use App\Category;
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
        $categories = Category::select('id', 'category_name')->get();
        return view('template.news', compact('posts', 'categories'));
    }
}
