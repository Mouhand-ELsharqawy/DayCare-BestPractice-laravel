<?php

namespace App\Providers;

use App\Repositories\Interfaces\MaleParentInterface;
use App\Repositories\Patterns\MaleParentRepository;
use Illuminate\Support\ServiceProvider;

class MaleParentProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(MaleParentInterface::class,MaleParentRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
