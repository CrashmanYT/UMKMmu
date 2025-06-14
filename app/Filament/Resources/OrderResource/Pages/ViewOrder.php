<?php

namespace App\Filament\Resources\OrderResource\Pages;

use App\Filament\Resources\OrderResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;
use Filament\Infolists\Components\Section;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Components\RepeatableEntry;
use Filament\Infolists\Infolist;

class ViewOrder extends ViewRecord
{
    protected static string $resource = OrderResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }

    protected function makeInfolist(): Infolist
    {
        return parent::makeInfolist()
            ->schema([
                Section::make('Order Details')
                    ->schema([
                        TextEntry::make('user_id'),
                        TextEntry::make('status'),
                        TextEntry::make('total_price'),
                    ]),
                Section::make('Products')
                    ->schema([
                        RepeatableEntry::make('items')
                            ->schema([
                                TextEntry::make('product.name')->label('Product Name'),
                                TextEntry::make('price'),
                                TextEntry::make('quantity'),
                            ]),
                    ]),
            ]);
    }
}
