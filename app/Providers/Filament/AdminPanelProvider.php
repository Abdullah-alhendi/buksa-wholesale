<?php
namespace App\Providers\Filament;

use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\AuthenticateSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Pages;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Widgets;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;

class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->id('admin')
            ->path('filament.admin.pages.dashboard')
            ->colors([
                'primary' => Color::Amber,
            ])
            ->brandLogo(asset('images/Buksa4.png')) // ✅ أضف الشعار من مجلد public/images/logo.png
            ->brandName('بكسة') // ✅ اسم التطبيق بجانب الشعار
            ->resources([
                \App\Filament\Admin\Resources\CategoryResource::class,
                \App\Filament\Admin\Resources\ProductResource::class,
                \App\Filament\Admin\Resources\UserResource::class,
                \App\Filament\Admin\Resources\OrderResource::class,
                \App\Filament\Admin\Resources\OfferResource::class,
                \App\Filament\Admin\Resources\CartResource::class,
            ])
            ->pages([
                Pages\Dashboard::class,
            ])
            ->widgets([
                Widgets\AccountWidget::class,
                \App\Filament\Admin\Widgets\StatsOverview::class,
                \App\Filament\Admin\Widgets\RecentOrders::class,
                \App\Filament\Admin\Widgets\MonthlySalesChart::class,
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
            ]);
    }
}
