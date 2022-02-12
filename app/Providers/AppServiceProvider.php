<?php

namespace App\Providers;

use App\Http\Controllers\Api\GitController;
use App\Post;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $tag = GitController::getLastVersionTag();
        \view()->share('tag', $tag);
        $lastNews = [
            'error' => 'Записи новин відсутні'
        ];
        if (Post::all()->count() > 6) {
            $lastNews = Post::getLastNews(6);
        }
        \view()->share('lastNews', $lastNews);
    }
}
