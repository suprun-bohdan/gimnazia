<?php

namespace App\Providers;

use App\Http\Controllers\Api\GitController;
use App\Post;
use App\Slider;
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
        $lastNews = false;
        $sliders = false;
        if (Slider::all()->count() > 0) {
            $sliders = Slider::all();
        }
        \view()->share('sliders', $sliders);

        if (Post::all()->count() > 6) {
            $lastNews = Post::getLastNews(6);
        }
        \view()->share('lastNews', $lastNews);
    }
}
