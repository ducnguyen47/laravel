<?php

namespace Modules\Core\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Core\Contracts\Breadcrumb\BreadcrumbContract;
use Modules\Core\Contracts\Breadcrumb\Breadcrumb;
use Modules\Core\Contracts\Template\TemplateContract;
use Modules\Core\Contracts\Template\Template;
use Modules\Core\Contracts\Option\Option;
use Modules\Core\Contracts\Option\OptionEloquentRepository;
use Modules\Core\Contracts\Option\OptionCacheRepository;
use Modules\Core\Models\Option as OptionModel;
use View;

class CoreServiceProvider extends ServiceProvider
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
        $this->loadTranslationsFrom(__DIR__.'/../Resources/lang', 'core');
        $this->loadViewsFrom(__DIR__.'/../Resources/views/admin', 'core');

        /**
         * Admin path
         */
        View::composer('*', function ($view) {
            $view->with('admin_path', asset('assets/admin'));
        });

        View::composer('core::layouts.app', function ($view) {
            $view->with('js_available', ['csrfToken' => csrf_token()]);
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        require_once __DIR__ . '/../helper.php';

        $this->app->alias(BreadcrumbContract::class, 'breadcrumbs');
        $this->app->singleton(BreadcrumbContract::class, Breadcrumb::class);

        $this->app->alias(TemplateContract::class, 'templates');
        $this->app->singleton(TemplateContract::class, Template::class);

        $this->app->bind(Option::class, function ($app) {
            if ($this->app['config']['app.cache']) {
                return new OptionCacheRepository(new OptionEloquentRepository(new OptionModel()));
            }
            return new OptionEloquentRepository(new OptionModel());
        });
    }
}
