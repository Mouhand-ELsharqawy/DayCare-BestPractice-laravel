<?php

namespace App\Providers;

use App\Repositories\Interfaces\FemaleParentInterface;
use App\Repositories\Patterns\FemaleParentRepository;
use Illuminate\Support\ServiceProvider;

class FemaleParentProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(FemaleParentInterface::class,FemaleParentRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
