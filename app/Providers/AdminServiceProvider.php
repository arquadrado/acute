<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Support\Admin\AdminResourceManager;

class AdminServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('AdminResourceManager', function ($app) {
            $service = studly_case($this->app['config']->get('admin.service'));
            $service = $this->app->make("App\\Services\\$service");
            return new AdminResourceManager($service);
        });
    }
}
