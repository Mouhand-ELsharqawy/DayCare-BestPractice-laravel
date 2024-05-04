<?php

namespace App\Providers;

use App\Repositories\Interfaces\ChildrenInterface;
use App\Repositories\Patterns\ChildrenRepository;
use Illuminate\Support\ServiceProvider;

class ChildrenProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(ChildrenInterface::class,ChildrenRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
