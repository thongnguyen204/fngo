<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\BackendServiceProvider;

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
        $this->app->register(
            BackendServiceProvider::class
        );
        
        
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
