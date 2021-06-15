<?php

namespace App\Providers;

use App\View\Components\Navbar;
use App\View\Components\Sidebar;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Schema;
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
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        // Blade::component('sidebar', Sidebar::class);
        // Blade::component('navbar', Navbar::class);
        
        Gate::define('isAdmin', function($user)
        {
            if($user->role === 'ADMIN')
            {
                return true;
            }
            else
            {
                return false;
            }
        });

        Gate::define('isDev', function($user)
        {
            if($user->role === 'DEV')
            {
                return true;
            }
            else
            {
                return false;
            }
        });
    }
}
