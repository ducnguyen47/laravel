<?php

namespace Modules\Post\Providers;

use Modules\Post\Models\Post;
use Modules\Post\Models\Category;
use Modules\Post\Repositories\Post\PostRepository;
use Modules\Post\Repositories\Post\PostCacheRepository;
use Modules\Post\Repositories\Post\PostEloquentRepository;
use Modules\Post\Repositories\Category\CategoryRepository;
use Modules\Post\Repositories\Category\CategoryCacheRepository;
use Modules\Post\Repositories\Category\CategoryEloquentRepository;
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

        require_once __DIR__ . '/../helper.php';

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
        $this->app->bind(CategoryRepository::class, function ($app) {
            if ($app['config']['app.cache']) {
                return new CategoryCacheRepository(new CategoryEloquentRepository(new Category()));
            }
            return new CategoryEloquentRepository(new Category());
        });

        $this->app->bind(PostRepository::class, function ($app) {
            if ($app['config']['app.cache']) {
                return new PostCacheRepository(new PostEloquentRepository(new Post()));
            }
            return new PostEloquentRepository(new Post());
        });
    }
}
