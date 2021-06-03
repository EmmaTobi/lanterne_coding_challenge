<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //Load the StationService service into the service container
        $this->app->bind(\App\Services\StationService::class, function($app){
            return new \App\Services\StationServiceImpl();
        });
    }
}
