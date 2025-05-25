<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MakeAdminController extends Controller
{
    public function index()
    {
        if (Auth::check()):
            $admin = User::find(Auth::id());
            $admin->role = 2;
            $admin->save();
        endif;
        if (Auth::user()->role) :
            return redirect()->route('index');
        endif;
        return view('errors.info', ['message' => 'Вітаю, Аи Адмін!']);
    }
}
