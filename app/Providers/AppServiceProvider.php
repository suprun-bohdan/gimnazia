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
        // horizon auth
        if (app()->environment('production')) {
            \Laravel\Horizon\Horizon::auth(fn($request) => auth()->check() && auth()->user()->is_admin);
            URL::forceScheme('https');
        } else {
            \Laravel\Horizon\Horizon::auth(fn() => true);
        }

        // memory log
        Log::info('memory peak: ' . round(memory_get_peak_usage(true) / 1024 / 1024, 2) . ' MB');

        // git tag кеш на добу
        View::share('tag', Cache::remember('git:last_version_tag', 86400, fn() => GitController::getLastVersionTag()));

        // слайдери кеш на добу
        $this->shareIfTableExists('sliders', fn() => Cache::remember('sliders', 86400, fn() => Slider::all()));

        // останні новини кеш на добу
        $this->shareIfTableExists('posts', function () {
            if (Post::count() <= 5) {
                return false;
            }
            return Cache::remember('last_news', 86400, fn() => Post::getLastNews(6));
        }, 'lastNews');

        // налаштування кеш на добу
        $this->shareSettings(['fb', 'ig', 'favicon', 'sitename', 'full_sitename', 'logo', 'only_sitename']);

        // навігація кеш на добу
        $this->shareIfTableExists('navs', fn() => Cache::remember('navs', 86400, fn() => Nav::all()));
    }

    protected function tableExists(string $table): bool
    {
        return Cache::remember("schema_has_table:$table", 86400, fn() => Schema::hasTable($table));
    }

    protected function shareIfTableExists(string $table, callable $resolver, string $viewKey = null): void
    {
        if (! $this->tableExists($table)) {
            return;
        }
        View::share($viewKey ?? $table, $resolver());
    }

    protected function shareSettings(array $keys): void
    {
        if (! $this->tableExists('settings')) {
            return;
        }

        $settings = Cache::remember('settings_values', 86400, function () use ($keys) {
            return Setting::whereIn('value', $keys)
                ->get()
                ->keyBy('value');
        });

        $viewData = [];

        foreach ($keys as $key) {
            $viewData[$key] = $key === 'only_sitename'
                ? isset($settings[$key])
                : ($settings[$key]->data ?? null);
        }

        View::share($viewData);
    }



}
