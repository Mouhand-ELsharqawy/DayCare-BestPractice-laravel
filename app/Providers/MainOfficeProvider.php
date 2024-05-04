<?php

namespace App\Providers;

use App\Repositories\Interfaces\MainOfficeInterface;
use App\Repositories\Patterns\MainOfficeRepository;
use Illuminate\Support\ServiceProvider;

class MainOfficeProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(MainOfficeInterface::class,MainOfficeRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
