<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Visitor;
use Illuminate\Http\Request;

class VisitorController extends Controller
{
    public static function getAllVisitors()
    {
        return Visitor::count();
    }
}
