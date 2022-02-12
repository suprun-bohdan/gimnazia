<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
}
