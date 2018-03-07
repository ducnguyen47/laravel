<?php

namespace Modules\Page\Providers;

use Illuminate\Support\ServiceProvider;

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

        register_sluggable('Modules\Page\Models\Page', 'Modules\Page\Http\Controllers\Web\PageController@index');
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
