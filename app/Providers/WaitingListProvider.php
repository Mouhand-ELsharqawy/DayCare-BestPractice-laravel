<?php

namespace App\Providers;

use App\Repositories\Interfaces\WaitinglistInterface;
use App\Repositories\Patterns\WaitinglistRepository;
use Illuminate\Support\ServiceProvider;

class WaitingListProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(WaitinglistInterface::class,WaitinglistRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
