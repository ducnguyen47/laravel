<?php

namespace Modules\Core\Providers;

use Modules\Core\Models\Sluggable;
use Modules\Core\Contracts\Sluggable\SlugManager as SlugManagerContract;
use Modules\Core\Contracts\Sluggable\SlugRepository as SlugRepositoryContract;
use Modules\Core\Supports\Sluggable\Manager as SlugManager;
use Modules\Core\Supports\Sluggable\SluggableCacheRepository;
use Modules\Core\Supports\Sluggable\SluggableEloquentRepository;
use Illuminate\Support\ServiceProvider;

class SluggableServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(SlugManagerContract::class, SlugManager::class);
        $this->app->alias(SlugManagerContract::class, 'sluggable');

        $this->app->bind(SlugRepositoryContract::class, function ($app) {
            if ($app['config']['app.cache']) {
                return new SluggableCacheRepository(new SluggableEloquentRepository(new Sluggable()));
            }
            return new SluggableEloquentRepository(new Sluggable());
        });
    }
}
