<?php

namespace App\Providers\Filament;

use Filament\Pages;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Http\Middleware\Authenticate;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\AuthenticateSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Chiiya\FilamentAccessControl\FilamentAccessControlPlugin;
use App\Filament\Resources\UserResource\Widgets\DashboardOverview;
use App\Filament\Resources\UserResource\Widgets\DashboardOverview1;
use App\Filament\Resources\UserResource\Widgets\DashboardOverview2;
use App\Filament\Resources\UserResource\Widgets\DashboardOverview3;
use App\Filament\Resources\UserResource\Widgets\DashboardOverview4;


class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->id('admin')
            ->path('/')
            ->plugin(FilamentAccessControlPlugin::make())
            ->favicon(asset('favicon.png'))
            ->font('Poppins')
            ->colors([
                'primary' => Color::hex('#f40000'),
                'bnb-blue' => Color::hex('#252D60'),
                'bnb-dark' => Color::hex('#181D2B'),
                'white' => Color::hex('#ffffff'),
                'off-white' => Color::hex('#DBDBDB'),
                'black' => Color::hex('#000000'),
            ])
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\\Filament\\Resources')
            // ->discoverPages(in: app_path('Filament/Pages'), for: 'App\\Filament\\Pages')
            ->pages([
                Pages\Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\\Filament\\Widgets')
            ->widgets([

                DashboardOverview1::class,
                DashboardOverview2::class,
                DashboardOverview3::class,
                DashboardOverview4::class,


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
            ->authMiddleware([
                Authenticate::class,
            ])
            ->sidebarCollapsibleOnDesktop()
            ->sidebarWidth('18rem');
    }


}
