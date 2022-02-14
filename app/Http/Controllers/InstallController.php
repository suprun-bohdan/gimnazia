<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InstallController extends Controller
{
    public function install()
    {
        $test = DB::select('select `data` FROM `settings` where `value` = ?', ['test']);
        if ($test == true) :
            die;
        else:
        Setting::createColumns();
        endif;
    }
}
