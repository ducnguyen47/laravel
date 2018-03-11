<?php

namespace Modules\Page\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Page\Models\Page;
use Modules\Page\Repositories\PageRepository;
use Modules\Page\Repositories\PageCacheRepository;
use Modules\Page\Repositories\PageEloquentRepository;

class PageServiceProvider extends ServiceProvider
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
        $this->loadTranslationsFrom(__DIR__.'/../Resources/lang', 'page');
        $this->loadViewsFrom(__DIR__.'/../Resources/views/admin', 'page');

        require_once __DIR__ . '/../helper.php';

        register_sluggable('Modules\Page\Models\Page', 'Modules\Page\Http\Controllers\Web\PageController@index');
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(PageRepository::class, function ($app) {
            if ($app['config']['app.cache']) {
                return new PageCacheRepository(new PageEloquentRepository(new Page()));
            }
            return new PageEloquentRepository(new Page());
        });
    }
}
