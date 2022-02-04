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
            return auth()->check() && auth()->user()->profile ==1;
        });
        Blade::if('publisher', function () {
            return auth()->check() && auth()->user()->profile ==3;
        });
        Blade::if('advertiser', function () {
            return auth()->check() && auth()->user()->profile ==2;
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
