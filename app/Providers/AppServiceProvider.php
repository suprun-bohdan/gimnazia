<?php

namespace App\Providers;

use App\Http\Controllers\Api\GitController;
use App\Post;
use App\Setting;
use App\Slider;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
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
        if (Schema::hasTable('sliders')) :
            if (Slider::all()->count() > 0) {
                $sliders = Slider::all();
            }
            \view()->share('sliders', $sliders);
        endif;
        if (Schema::hasTable('posts')) :
            if (Post::all()->count() > 6) {
                $lastNews = Post::getLastNews(6);
            }
            \view()->share('lastNews', $lastNews);
        endif;

        if (Schema::hasTable('settings')) {
            $fb = Setting::where('value', 'fb')->first();
            $ig = Setting::where('value', 'ig')->first();
            $favicon = Setting::where('value', 'favicon')->first();
            $sitename = Setting::where('value', 'sitename')->first();
            $full_sitename = Setting::where('value', 'full_sitename')->first();
            $logo = Setting::where('value', 'logo')->first();
        }

        view()->share('fb', $fb);
        view()->share('ig', $ig);
        view()->share('favicon', $favicon);
        view()->share('sitename', $sitename);
        view()->share('full_sitename', $full_sitename);
        view()->share('logo', $logo);
    }
}
