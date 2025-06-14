<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

class SellerDashboard extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-chart-bar';
    protected static string $view = 'filament.pages.seller-dashboard';
    protected static ?string $title = 'Dashboard Penjual';

    public static function canAccess(): bool
    {
        return auth()->check() && auth()->user()->can('access seller dashboard');
    }

    public static function getWidgets(): array
    {
        return [
            \App\Filament\Widgets\SellerSalesChart::class,
            // Tambahkan widget lainnya jika diperlukan
        ];
    }
}
