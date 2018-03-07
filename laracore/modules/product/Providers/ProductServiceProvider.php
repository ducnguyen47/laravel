<?php

namespace Modules\Product\Providers;

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
        $this->loadMigrationsFrom(__DIR__.'/../Database/Migrations');
        $this->loadTranslationsFrom(__DIR__.'/../Resources/lang', 'product');
        $this->loadViewsFrom(__DIR__.'/../Resources/views/admin', 'product');

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
        require_once __DIR__ . '/../helper.php';
    }
}
