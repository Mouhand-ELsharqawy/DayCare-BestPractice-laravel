<?php

namespace App\Providers;

use App\Repositories\Interfaces\ProgramInterface;
use App\Repositories\Patterns\ProgramRepository;
use Illuminate\Support\ServiceProvider;

class ProgramProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(ProgramInterface::class,ProgramRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
