<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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
if (config('app.register')):
    if (!auth()->check()) :
        Route::get('/register', 'UserController@register');
        Route::post('/register', 'UserController@store')->name('register');
    endif;
endif;

if (config('app.login')):
    if (!auth()->check()) :
        Route::get('/login', 'UserController@login');
        Route::post('/login', 'UserController@check')->name('login');
        Route::get('/logout', 'UserController@logout')->name('logout');
    endif;
endif;

Route::post('/upload-image', 'CkeditorController@uploadImage')->name('ckUploadImage');

Route::group(['middleware' => 'admin'], function () {
    Route::prefix('admin')->group(function () {
        Route::get('/', 'Admin\AdminController@index')->name('admin');

        Route::prefix('news')->group(function () {
            Route::get('/create', 'Admin\AdminController@news')->name('newsAdd');
            Route::post('/create', 'Admin\NewsController@create')->name('newsCreate');
        });
        Route::prefix('settings')->group(function () {
            Route::get('/', 'Admin\AdminController@settings')->name('settings');
        });
    });
});


if (config('app.suspended') == true) :
    Route::get('/', function () {
        return view('suspended');
    });
else :


    Route::get('/', 'IndexController@index')->name('index');
    Route::get('/news', 'IndexController@news');
    Route::get('/post/{post_id}', 'PostController@index')->name('post');


endif;

