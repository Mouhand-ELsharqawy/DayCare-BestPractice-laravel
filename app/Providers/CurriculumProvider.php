<?php

namespace App\Providers;

use App\Repositories\Interfaces\CurriculumInterface;
use App\Repositories\Patterns\CurriculumRepository;
use Illuminate\Support\ServiceProvider;

class CurriculumProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(CurriculumInterface::class,CurriculumRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
