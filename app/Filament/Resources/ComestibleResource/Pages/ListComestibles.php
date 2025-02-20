<?php

namespace App\Filament\Resources\ComestibleResource\Pages;

use App\Filament\Resources\ComestibleResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Resources\Pages\ListRecords\Tab;

class ListComestibles extends ListRecords
{
    protected static string $resource = ComestibleResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    public  function getTabs(): array{
        return [
           'all' => Tab::make('All'),
            'Appetizer' => Tab::make()->query(fn ($query) => $query->where('category', 'Appetizer')),
            'Main Dish' => Tab::make()->query(fn ($query) => $query->where('category', 'Main Dish')),
            'Protein' => Tab::make()->query(fn ($query) => $query->where('category', 'Protein')),
            'Drink' => Tab::make()->query(fn ($query) => $query->where('category', 'Drink')),
            'Hydration' => Tab::make()->query(fn ($query) => $query->where('category', 'Hydration')),
            'Dessert' => Tab::make()->query(fn ($query) => $query->where('category', 'Dessert')),

        ];
    }
}
