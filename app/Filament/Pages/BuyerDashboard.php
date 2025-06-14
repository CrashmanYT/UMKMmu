<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

class BuyerDashboard extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.buyer-dashboard';

    protected static ?string $slug = 'buyer-dashboard';
    protected static ?string $routeName = 'filament.pages.buyer-dashboard';
    protected static ?string $title = 'Dashboard Pembeli';

    protected static bool $shouldRegisterNavigation = true;

    public static function canAccess(): bool
    {
        return auth()->check() && auth()->user()->can('access buyer dashboard');
    }
}
