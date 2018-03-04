<?php

namespace Modules\Core\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Core\Contracts\Breadcrumb\BreadcrumbContract;
use Modules\Core\Contracts\Breadcrumb\Breadcrumb;
use Modules\Core\Contracts\Template\TemplateContract;
use Modules\Core\Contracts\Template\Template;
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
        $this->loadMigrationsFrom(__DIR__.'/../Database/migrations');
        $this->loadTranslationsFrom(__DIR__.'/../Resources/lang', 'core');
        $this->loadViewsFrom(__DIR__.'/../Resources/views/admin', 'core');

        /**
         * Admin path
         */
        View::share(
            'admin_path', asset('assets/admin')
        );

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
    }
}
