<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrapFive();
        if(env("APP_ENV")==="local"){
            DB::listen(function ($query) {
                error_log($query->sql);     //for logging the actual query
                error_log($query->time);    //for logging the time
            });
        }
    }
}
