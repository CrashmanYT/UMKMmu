<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;

class SellerSalesChart extends ChartWidget
{
    protected static ?string $heading = 'Grafik Penjualan Bulanan';

    protected function getData(): array
    {
        $userId = auth()->id();

        $data = DB::table('order_items')
            ->join('products', 'order_items.product_id', '=', 'products.id')
            ->join('seller_profiles', 'products.seller_id', '=', 'seller_profiles.id')
            ->where('seller_profiles.user_id', $userId)
            ->selectRaw('DATE_FORMAT(order_items.created_at, "%b %Y") as month, SUM(order_items.price * order_items.quantity) as total')
            ->groupBy('month')
            ->orderByRaw('MIN(order_items.created_at)')
            ->pluck('total', 'month');

        return [
            'datasets' => [
                [
                    'label' => 'Total Penjualan',
                    'data' => $data->values(),
                    'backgroundColor' => '#f59e0b',
                    'borderColor' => '#f59e0b',
                ],
            ],
            'labels' => $data->keys(),
        ];
    }

    protected function getType(): string
    {
        return 'line'; 
    }
}
