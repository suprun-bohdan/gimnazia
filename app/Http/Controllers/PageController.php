<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PageController extends Controller
{
    public function index($page_id){
        $page = DB::table('pages')->where('page_id', $page_id)->first();
        abort_if(!$page, 404);
        return view('template.page', ['page' => $page]);
    }
}
