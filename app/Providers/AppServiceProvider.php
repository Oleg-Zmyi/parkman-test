<?php

namespace App\Providers;

use App\Repositories\GarageMySQLRepository;
use App\Repositories\GarageRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        app()->bind(GarageRepositoryInterface::class, GarageMySQLRepository::class);

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
