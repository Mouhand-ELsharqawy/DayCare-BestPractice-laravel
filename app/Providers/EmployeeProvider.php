<?php

namespace App\Providers;

use App\Repositories\Interfaces\EmployeeInterface;
use App\Repositories\Patterns\EmployeeRepository;
use Illuminate\Support\ServiceProvider;

class EmployeeProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(EmployeeInterface::class,EmployeeRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
