<?php

namespace App\Providers;

use App\Http\Controllers\Api\GitController;
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
    }
}
