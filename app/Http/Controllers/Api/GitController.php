<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class GitController extends Controller
{
    public static function getLastVersionTag()
    {
        $result = "dev";
        return $result;
    }
}
