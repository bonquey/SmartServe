<?php

namespace App\Filament\Resources\MenuResource\Pages;

use App\Filament\Resources\MenuResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Resources\Pages\ListRecords\Tab; // Import Tab

class ListMenus extends ListRecords
{
    protected static string $resource = MenuResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    public  function getTabs(): array{
        return [
           'all' => Tab::make('All'),
            'pending' => Tab::make()->query(fn ($query) => $query->where('status', 'Pending')),
            'process' => Tab::make()->query(fn ($query) => $query->where('status', 'Processing')),
            'delivered' => Tab::make()->query(fn ($query) => $query->where('status', 'Delivered')),
        ];
    }
}
