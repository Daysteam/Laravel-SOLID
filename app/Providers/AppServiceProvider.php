<?php

namespace App\Providers;

use App\Contracts\Interfaces\SiswaRepositoryInterface;
use App\Contracts\Repositories\SiswaRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(SiswaRepositoryInterface::class, SiswaRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
