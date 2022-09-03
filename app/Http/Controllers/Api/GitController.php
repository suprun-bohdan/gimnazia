<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class GitController extends Controller
{
    public static function getLastVersionTag()
    {
        $result = "0.1";
        $response = Http::withToken(config('app.gitToken'))->get('http://gitlab.com/api/v4/projects/33163427/repository/tags');
        $result = $response->json();
        if (isset($data)){
            $result = $data[0]['name'];
        }
        return $result;
    }
}
