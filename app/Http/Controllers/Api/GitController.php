<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class GitController extends Controller
{
    public static function getLastVersionTag()
    {
        $response = Http::withToken(config('app.gitToken'))->get('http://gitlab.com/api/v4/projects/33163427/repository/tags');
        $data = $response->json();
        $data = $data[0]['name'];
        return $data;
    }
}
