<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('admin.categories', ['categories' => $categories]);
    }

    public function create(Request $request)
    {
        Category::create([
            'category_name' => $request->category_name
        ]);
        return redirect()->route('categories');
    }

    public function destroy($id)
    {
        Category::destroy($id);
        return redirect()->route('categories');
    }

    public function sort($category_id) {
        $posts = DB::table('posts')->where('category_id', $category_id)->paginate(6);
        $categories = Category::all();
        return view('template.news', ['posts' => $posts, 'categories' => $categories]);
    }
}
