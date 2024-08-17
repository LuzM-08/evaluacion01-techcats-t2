<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer(['backoffice.dashboard', 'layouts.app', 'partials.sidebar'], function ($view) {
            $view->with('nombreUsuario', Auth::user()->nombre);
        });
    }
}
