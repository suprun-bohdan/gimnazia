<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Api\LikeController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\VisitorController;
use App\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $visitorsCount = VisitorController::getAllVisitors();
        $likesCount = LikeController::getAllLikesCount();
        $usersCount = User::count();
        return view('admin.index', ['visitorsCount' => $visitorsCount, 'likesCount' => $likesCount, 'usersCount' => $usersCount]);
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
