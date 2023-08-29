<?php

namespace App\Providers;

use App\Helpers\PaginationHelper;
use Illuminate\Support\ServiceProvider;
use App\Helpers\Interfaces\PaginationHelperInterface;

class HelperServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(PaginationHelperInterface::class, PaginationHelper::class);
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
