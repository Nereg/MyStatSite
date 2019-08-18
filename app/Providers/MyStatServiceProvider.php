<?php

namespace App\Providers;
require_once 'MAPI.php';
use Illuminate\Support\ServiceProvider;

class MyStatServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $api = new MyStat();

        $this->app->instance('MyStat\Api', $api);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
