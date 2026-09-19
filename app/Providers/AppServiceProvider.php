<?php

namespace App\Providers;

use Filament\Support\Facades\FilamentView;
use Filament\View\PanelsRenderHook;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

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
        FilamentView::registerRenderHook(
            PanelsRenderHook::AUTH_LOGIN_FORM_BEFORE,
            fn () => Blade::render('
                <style>
                    /* Make the login page background a rich gradient */
                    .fi-simple-layout {
                        background: linear-gradient(135deg, #0f172a 0%, #1e3a8a 100%) !important;
                    }
                    /* Turn the standard login box into a sleek translucent panel */
                    .fi-simple-main-ctn {
                        background-color: rgba(255, 255, 255, 0.08) !important;
                        backdrop-filter: blur(12px) !important;
                        border: 1px solid rgba(255, 255, 255, 0.1) !important;
                        border-radius: 1rem !important;
                    }
                    /* Tweak font styles for the custom theme */
                    .fi-simple-header-heading {
                        color: #ffffff !important;
                    }
                </style>
            ')
        );
    }
}
