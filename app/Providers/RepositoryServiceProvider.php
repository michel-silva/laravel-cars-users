<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {        
        $this->app->bind(
            \App\Contracts\AuthInterface::class, 
            \App\Repositories\AuthRepository::class
        );

        $this->app->bind(
            \App\Contracts\BrandInterface::class, 
            \App\Repositories\BrandRepository::class
        );

        $this->app->bind(
            \App\Contracts\CarInterface::class, 
            \App\Repositories\CarRepository::class
        );

        $this->app->bind(
            \App\Contracts\UserInterface::class, 
            \App\Repositories\UserRepository::class
        );
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
