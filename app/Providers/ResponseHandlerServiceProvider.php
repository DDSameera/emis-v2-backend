<?php

namespace App\Providers;

use App\Services\JsonResponseHandlerService;
use Illuminate\Support\ServiceProvider;

class ResponseHandlerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind('JsonResponseHandlerService', function () {
            return new JsonResponseHandlerService();
        });
    }
}
