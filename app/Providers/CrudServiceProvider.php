<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Support\Crud\CrudManager;

class CrudServiceProvider extends ServiceProvider
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
        $this->app->singleton('CrudManager', function ($app) {
            $service = studly_case($this->app['config']->get('crud.service'));
            $service = $this->app->make("App\\Services\\$service");
            return new CrudManager($service);
        });
    }
}
