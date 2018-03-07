<?php

namespace Modules\Post\Providers;

use Illuminate\Support\ServiceProvider;

class PostServiceProvider extends ServiceProvider
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
        $this->loadTranslationsFrom(__DIR__.'/../Resources/lang', 'post');
        $this->loadViewsFrom(__DIR__.'/../Resources/views/admin', 'post');

        register_sluggable('Modules\Post\Models\Post', 'Modules\Post\Http\Controllers\Web\PostController@index');

        register_sluggable('Modules\Post\Models\Category', 'Modules\Post\Http\Controllers\Web\CategoryController@index');
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
