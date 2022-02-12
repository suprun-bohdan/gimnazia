<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Controllers\VisitorController;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $visitorsCount = VisitorController::getAllVisitors();
        return view('admin.index', ['visitorsCount' => $visitorsCount]);
    }

    public function news()
    {
        $categories = Category::all();
        return view('admin.newsAdd', ['categories' => $categories]);
    }

    public function settings()
    {
        return view('admin.settings');
    }
}
