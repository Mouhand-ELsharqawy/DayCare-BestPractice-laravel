<?php

namespace App\Providers;

use App\Repositories\Interfaces\ToyInterface;
use App\Repositories\Patterns\ToyRepository;
use Illuminate\Support\ServiceProvider;

class ToyProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(ToyInterface::class,ToyRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
