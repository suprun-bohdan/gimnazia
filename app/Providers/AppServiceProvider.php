<?php
namespace App\Providers;

use App\Http\Controllers\Api\GitController;
use App\Nav;
use App\Post;
use App\Setting;
use App\Slider;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    public function register()
    {
        //
    }

    public function boot()
    {
        if (app()->environment('production')) {
            \Laravel\Horizon\Horizon::auth(fn($request) => auth()->check() && auth()->user()->is_admin);
        } else {
            \Laravel\Horizon\Horizon::auth(fn() => true);
        }

        Log::info('memory peak: ' . round(memory_get_peak_usage(true) / 1024 / 1024, 2) . ' MB');
        if (app()->environment('production')) {
            URL::forceScheme('https');
        }

        View::share('tag', GitController::getLastVersionTag());

        $this->shareIfTableExists('sliders', function () {
            return Slider::query()->exists() ? Slider::query()->get() : false;
        });

        $this->shareIfTableExists('posts', function () {
            return Post::count() > 5 ? Post::getLastNews(6) : false;
        }, 'lastNews');

        $this->shareSettings([
            'fb', 'ig', 'favicon', 'sitename', 'full_sitename', 'logo', 'only_sitename'
        ]);

        $this->shareIfTableExists('navs', fn () => Cache::remember('navs', 3600, fn () => Nav::all()));
    }

    protected function shareIfTableExists(string $table, callable $resolver, string $viewKey = null): void
    {
        if (!Schema::hasTable($table)) {
            return;
        }

        $data = $resolver();
        View::share($viewKey ?? $table, $data);
    }

    protected function shareSettings(array $keys): void
    {
        if (!Schema::hasTable('settings')) {
            return;
        }

        $settings = Setting::whereIn('value', $keys)->get()->keyBy('value');

        foreach ($keys as $key) {
            View::share($key, $key === 'only_sitename' ? isset($settings[$key]) : $settings[$key] ?? null);
        }
    }
}
