<?php

namespace Modules\Product\Providers;

use Modules\Product\Models\Product;
use Modules\Product\Models\Category;
use Modules\Product\Repositories\Product\ProductRepository;
use Modules\Product\Repositories\Product\ProductCacheRepository;
use Modules\Product\Repositories\Product\ProductEloquentRepository;
use Modules\Product\Repositories\Category\CategoryRepository;
use Modules\Product\Repositories\Category\CategoryCacheRepository;
use Modules\Product\Repositories\Category\CategoryEloquentRepository;
use Illuminate\Support\ServiceProvider;

class ProductServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/../Routes/admin.php');
        $this->loadRoutesFrom(__DIR__.'/../Routes/web.php');
        $this->loadMigrationsFrom(__DIR__.'/../Database/Migrations');
        $this->loadTranslationsFrom(__DIR__.'/../Resources/lang', 'product');
        $this->loadViewsFrom(__DIR__.'/../Resources/views/admin', 'product');

        require_once __DIR__ . '/../helper.php';

        register_sluggable('Modules\Product\Models\Product', 'Modules\Product\Http\Controllers\Web\ProductController@index');
        register_sluggable('Modules\Product\Models\Category', 'Modules\Product\Http\Controllers\Web\CategoryController@index');
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(CategoryRepository::class, function ($app) {
            if ($app['config']['app.cache']) {
                return new CategoryCacheRepository(new CategoryEloquentRepository(new Category()));
            }
            return new CategoryEloquentRepository(new Category());
        });

        $this->app->bind(ProductRepository::class, function ($app) {
            if ($app['config']['app.cache']) {
                return new ProductCacheRepository(new ProductEloquentRepository(new Product()));
            }
            return new ProductEloquentRepository(new Product());
        });
    }
}
