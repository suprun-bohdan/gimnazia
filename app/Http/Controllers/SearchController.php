<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    public function index(Request $request) {
        $query = strip_tags(trim($request->q));
        $page = $request->get('page', 1);
        $cacheKey = "search:{$query}:page:{$page}";

        $posts = Cache::remember($cacheKey, now()->addMinutes(10), function () use ($query) {
            return Post::query()
                ->where(function ($q) use ($query) {
                    $q->where('title', 'like', "%{$query}%")
                        ->orWhere('text', 'like', "%{$query}%")
                        ->orWhere('description', 'like', "%{$query}%");
                })
                ->orderBy('created_at', 'desc')
                ->paginate(12);
        });

        $categories = Cache::remember('categories:all', now()->addHours(1), function () {
            return Category::all();
        });

        return view('template.news', [
            'posts' => $posts,
            'categories' => $categories
        ]);
    }
}
