<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
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
        Blade::if('admin', function () {
            return true;
        });
        Blade::if('publisher', function () {
            return auth()->check() && auth()->user()->isPublisher();
        });
        Blade::if('advertiser', function () {
            return auth()->check() && auth()->user()->isAdvertiser();
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

}
