<?php

namespace App\Providers;

use App\Repositories\Interfaces\SchoolTripInterface;
use App\Repositories\Patterns\SchoolTripRepository;
use Illuminate\Support\ServiceProvider;

class SchoolTripProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(SchoolTripInterface::class,SchoolTripRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
