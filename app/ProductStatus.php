<?php

namespace App;

use Filament\Support\Contracts\HasIcon;
use Filament\Support\Contracts\HasLabel;
use Filament\Support\Contracts\HasColor;
 
enum ProductStatus: string implements HasLabel, HasColor, HasIcon
{
    case PENDING = 'Pending';
    case ONGOING = 'On Going';
    case DELIVERED = 'Delivered';
 
    public function getLabel(): ?string
    {
        return match ($this) {
            self::PENDING => 'Pending',
            self::ONGOING => 'On Going',
            self::DELIVERED => 'Delivered',
        };
    }
 
    public function getColor(): string|array|null
    {
        return match ($this) {
            self::PENDING => 'primary',
            self::ONGOING => 'warning',
            self::DELIVERED => 'success',
        };
    }
 
    public function getIcon(): ?string
    {
        return match ($this) {
            self::PENDING => 'heroicon-m-pencil',
            self::ONGOING => 'heroicon-m-eye',
            self::DELIVERED => 'heroicon-m-check',
        };
    }
}