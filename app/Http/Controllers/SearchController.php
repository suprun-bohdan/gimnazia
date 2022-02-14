<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    public function index(Request $request) {
        $query = htmlspecialchars($request->q);
//        $posts = DB::select('select * from posts where title, text, description LIKE "%" '. $query .'"%"');
        $posts = Post::query()
            ->where('title', 'LIKE', "%{$query}%")
            ->orWhere('text', 'LIKE', "%{$query}%")
            ->orWhere('description', 'LIKE', "%{$query}%")
            ->get();
        $categories = Category::all();
        return view('template.news', ['posts' => $posts, 'categories' => $categories]);
    }
}
