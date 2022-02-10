<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
if (config('app.suspended') == true) :
    Route::get('/', function () {
        return view('suspended');
    });
else :


    Route::get('/', function () {
        return view('template.index');
    });
    Route::get('/news', function () {
        return view('template.news');
    });


endif;

Auth::routes(['verify' => true]);

Route::get('/admin', 'HomeController@index')->middleware('verified')->name('home');
