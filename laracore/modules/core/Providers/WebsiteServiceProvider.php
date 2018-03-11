<?php

namespace Modules\Core\Providers;

use Illuminate\Support\ServiceProvider;
use View;

class WebsiteServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/../../../resources/views/website', 'website');

        View::composer('website::home', function ($view) {
            $view->with('asset_url', url('website'));
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
    }
}
