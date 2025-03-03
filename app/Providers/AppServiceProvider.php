<?php

namespace App\Providers;

use Illuminate\Foundation\Vite;
use App\Policies\ActivityPolicy;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\ServiceProvider;
use Spatie\Activitylog\Models\Activity;
use Filament\Support\Facades\FilamentView;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        FilamentView::registerRenderHook(
            'panels::body.end',
            fn(): string =>
            Blade::render("@vite('resources/js/app.js')")
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Gate::policy(Activity::class, ActivityPolicy::class);

        Event::listen(function (\SocialiteProviders\Manager\SocialiteWasCalled $event) {
            $event->extendSocialite('discord', \SocialiteProviders\Google\Provider::class);
        });

        $this->loadTranslationsFrom(__DIR__ . '/../lang', 'organization-structure');

        // app(Vite::class)->prefetch([
        //     'resources/js/app.js',
        //     'resources/css/app.css',
        //     'resources/css/filament/admin/theme.css',
        // ]);

        // // Ngrok For Development
        // if (config('app.env') === 'local') {
        //     URL::forceScheme('https');
        // }
    }
}
