<?php

namespace Modules\Widget\Providers;

use Modules\Widget\Models\Widget;
use Modules\Widget\Repositorie\WidgetRepository;
use Modules\Widget\Repositorie\WidgetCacheRepository;
use Modules\Widget\Repositorie\WidgetEloquentRepository;
use Illuminate\Support\ServiceProvider;

class WidgetServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/../Routes/admin.php');
        $this->loadMigrationsFrom(__DIR__.'/../Database/Migrations');
        $this->loadTranslationsFrom(__DIR__.'/../Resources/lang', 'widget');
        $this->loadViewsFrom(__DIR__.'/../Resources/views/admin', 'widget');

        require_once __DIR__ . '/../helper.php';
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(WidgetRepository::class, function ($app) {
            if ($app['config']['app.cache']) {
                return new WidgetCacheRepository(new WidgetEloquentRepository(new Widget()));
            }
            return new WidgetEloquentRepository(new Widget());
        });
    }
}
