<?php

namespace App\Providers;

use App\Repositories\Interfaces\ChildInterface;
use App\Repositories\Patterns\ChildRepository;
use Illuminate\Support\ServiceProvider;

class ChildProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(ChildInterface::class,ChildRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
