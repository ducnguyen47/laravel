<?php

namespace Modules\Core\Providers;

use Modules\Core\Models\Menu;
use Modules\Core\Repositories\MenuRepository;
use Modules\Core\Repositories\MenuCacheRepository;
use Modules\Core\Repositories\MenuEloquentRepository;
use Illuminate\Support\ServiceProvider;

class MenuServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // dd(menu('main-menu'));
    }
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(MenuRepository::class, function ($app) {
            if ($app['config']['app.cache']) {
                return new MenuCacheRepository(new MenuEloquentRepository(new Menu()));
            }
            return new MenuEloquentRepository(new Menu());
        });
    }
}
