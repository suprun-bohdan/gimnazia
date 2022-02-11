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
if (config('app.register') == true):
Route::get('/register', 'UserController@register');
Route::post('/register', 'UserController@store')->name('register');
endif;
if (config('app.login') == true):
    Route::get('/login', 'UserController@login');
endif;
Route::post('/upload-image', 'CkeditorController@uploadImage')->name('ckUploadImage');
Route::prefix('admin')->group(function (){
    Route::get('/', 'Admin\AdminController@index')->name('admin');
    Route::get('/news/create', 'Admin\AdminController@news')->name('newsAdd');
    Route::prefix('settings')->group(function () {
        Route::get('/', 'Admin\AdminController@settings')->name('settings');
    });
});


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

