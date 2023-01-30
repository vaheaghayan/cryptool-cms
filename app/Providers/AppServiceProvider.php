<?php

namespace App\Providers;

use App\Models\Algorithm\AlgorithmContract;
use App\Models\Algorithm\AlgorithmManager;
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
        $this->app->bind(AlgorithmContract::class, AlgorithmManager::class);
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
