<?php
namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class InterfaceServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(
            \App\Interfaces\UserInterface::class,
            \App\Services\UserService::class
        );
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
    }
}
