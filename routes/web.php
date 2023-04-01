<?php
use Spatie\Sitemap\SitemapGenerator;
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
if (config('app.debug'))
{
    Route::get('/info', function () {
       phpinfo();
    });
}

if (!auth()->check()) {
    Route::get('/make-admin', 'MakeAdminController@index');
}
Route::get('/install', 'InstallController@install');
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
        Route::get('/slider', 'Admin\SliderController@index')->name('slider');
        Route::get('/slider/list', 'Admin\SliderController@show')->name('sliderList');
        Route::get('/slider/destroy', 'Admin\SliderController@destroy')->name('slider.destroy');
        Route::post('/slider/create', 'Admin\SliderController@store')->name('sliderCreate');

        Route::prefix('news')->group(function () {
            Route::get('/create', 'Admin\AdminController@news')->name('newsAdd');
            Route::get('/list', 'Admin\NewsController@index')->name('newsList');
            Route::post('/create', 'Admin\NewsController@create')->name('newsCreate');
            Route::get('/destroy/{id}', 'Admin\NewsController@destroy')->name('newsDestroy');
        });
        Route::prefix('page')->group(function () {
            Route::get('/create', 'Admin\PageController@index')->name('create');
            Route::post('/create', 'Admin\PageController@store')->name('pageCreate');
            Route::get('/edit/{page_id}', 'Admin\PageController@edit')->name('page.edit');
            Route::get('/view', 'Admin\PageController@view')->name('page.view');
            Route::post('/update/{page_id}', 'Admin\PageController@update')->name('page.update');
            Route::get('/destroy/{id}', 'Admin\PageController@destroy')->name('page.destroy');
            Route::get('/fileDestroy/{page_id}/{id}', 'Admin\PageController@fileDestroy')->name('page.file.destroy');
        });
        Route::prefix('settings')->group(function () {
            Route::get('/site', 'Admin\AdminController@settings')->name('settings');
            Route::get('/show', 'Admin\SettingController@show')->name('showSettings');
            Route::get('/create', 'Admin\SettingController@create')->name('createSettings');
            Route::post('/create', 'Admin\SettingController@createField')->name('createField');
            Route::get('/edit/{id}', 'Admin\SettingController@editField')->name('editField');
            Route::post('/edit', 'Admin\SettingController@edit')->name('editFieldPost');
            Route::get('/destroy/{id}', 'Admin\SettingController@destroy')->name('destroyField');
        });

        Route::prefix('categories')->group(function () {
            Route::get('/show', 'CategoryController@index')->name('categories');
            Route::post('/show', 'CategoryController@create')->name('categoriesCreate');
            Route::get('/destroy/{id}', 'CategoryController@destroy')->name('categoryDestroy');
        });
        Route::prefix('navs')->group(function (){
            Route::get('/', 'NavsController@index')->name('navPage');
            Route::post('/', 'NavsController@store')->name('navAdd');
            Route::get('/remove/{id}', 'NavsController@destroy')->name('navRemove');
        });

        Route::prefix('teams')->group(function (){
            Route::get('/', 'Admin\TeamController@indexAdmin')->name('teamAdmin');
            Route::post('/create', 'Admin\TeamController@store')->name('teamCreate');
            Route::get('/destroy/{id}', 'Admin\TeamController@destroy')->name('teamDestroy');
        });
    });
});


if (config('app.suspended') == true) :
    Route::get('/', function () {
        return view('suspended');
    });
else :

    Route::get('/sitemap.xml', function () {
        SitemapGenerator::create(config('app.url'))->writeToFile(public_path('sitemap.xml'));

        return 'Sitemap generated';
    });
    Route::get('/', 'IndexController@index')->name('index');
//    Route::get('/news', 'IndexController@news');
    Route::get('/news', 'SearchController@index')->name('search');
    Route::get('/categories/{category_id}', 'CategoryController@sort')->name('category');
    Route::get('/post/{id}', 'PostController@index')->name('post');
    Route::get('/page/{id}', 'PageController@index')->name('page');
    Route::get('/team', 'Admin\TeamController@index')->name('team');

endif;

