<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::aliasComponent('components.inputError', 'inputError');
        Blade::aliasComponent('components.savedSuccefully', 'savedSuccefully');
        Blade::aliasComponent('components.unableToLoad', 'unableToLoad');
    }
}
