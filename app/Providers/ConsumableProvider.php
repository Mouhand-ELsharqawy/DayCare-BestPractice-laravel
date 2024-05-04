<?php

namespace App\Providers;

use App\Repositories\Interfaces\ConsumableInterface;
use App\Repositories\Patterns\ConsumableRepository;
use Illuminate\Support\ServiceProvider;

class ConsumableProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(ConsumableInterface::class,ConsumableRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
