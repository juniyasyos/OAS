<?php

namespace App\Providers\Filament;

use Filament\Pages;
use Filament\Panel;
use Filament\Widgets;
use Filament\PanelProvider;
use App\Filament\Pages\Login;
use App\Settings\KaidoSetting;
use Filament\Support\Colors\Color;
use Hasnayeen\Themes\ThemesPlugin;
use Illuminate\Support\Facades\Schema;
use Filament\Forms\Components\FileUpload;
use Rupadana\ApiService\ApiServicePlugin;
use Filament\Http\Middleware\Authenticate;
use Jeffgreco13\FilamentBreezy\BreezyCore;
use Hasnayeen\Themes\Http\Middleware\SetTheme;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\Cookie\Middleware\EncryptCookies;
use DutchCodingCompany\FilamentSocialite\Provider;
use BezhanSalleh\FilamentShield\FilamentShieldPlugin;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\AuthenticateSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Kenepa\TranslationManager\TranslationManagerPlugin;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
// use Laravel\Socialite\Contracts\User as SocialiteUserContract;
use DutchCodingCompany\FilamentSocialite\FilamentSocialitePlugin;

class AdminPanelProvider extends PanelProvider
{
    private ?KaidoSetting $settings = null;

    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->id('admin')
            ->path('')
            ->viteTheme('resources/css/filament/admin/theme.css')
            ->when($this->settings->login_enabled ?? true, fn($panel) => $panel->login(Login::class))
            ->when($this->settings->registration_enabled ?? true, fn($panel) => $panel->registration())
            ->when($this->settings->password_reset_enabled ?? true, fn($panel) => $panel->passwordReset())
            ->emailVerification()
            ->colors([
                'primary' => Color::Amber,
            ])
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\\Filament\\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\\Filament\\Pages')
            ->pages([
                Pages\Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\\Filament\\Widgets')
            ->widgets([
                Widgets\AccountWidget::class,
                Widgets\FilamentInfoWidget::class,
            ])
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            ->sidebarCollapsibleOnDesktop(true)
            ->authMiddleware([
                Authenticate::class,
            ])
            ->middleware([
                SetTheme::class
            ])
            ->plugins(
                $this->getPlugins()
            )
            ->databaseNotifications();
    }

    private function getPlugins(): array
    {
        $plugins = [
            ThemesPlugin::make(),
            FilamentShieldPlugin::make(),
            ApiServicePlugin::make(),
            BreezyCore::make()
                ->myProfile(
                    shouldRegisterUserMenu: true, // Sets the 'account' link in the panel User Menu (default = true)
                    shouldRegisterNavigation: true, // Adds a main navigation item for the My Profile page (default = false)
                    navigationGroup: 'Settings', // Sets the navigation group for the My Profile page (default = null)
                    hasAvatars: true, // Enables the avatar upload form component (default = false)
                    slug: 'my-profile'
                )
                ->avatarUploadComponent(fn($fileUpload) => $fileUpload->disableLabel())
                ->avatarUploadComponent(
                    fn() => FileUpload::make('avatar_url')
                        ->image()
                        ->disk('public/user-profile/')
                )
                ->enableTwoFactorAuthentication(),
        ];

        if ($this->settings->sso_enabled ?? true) {
            $plugins[] =
                FilamentSocialitePlugin::make()
                    ->providers([
                        Provider::make('google')
                            ->label('Google')
                            ->icon('fab-google')
                            ->color(Color::hex('#2f2a6b'))
                            ->outlined(true)
                            ->stateless(false)
                    ])->registration(true);
        }
        return $plugins;
    }
}
