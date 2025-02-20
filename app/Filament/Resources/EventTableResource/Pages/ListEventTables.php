<?php

namespace App\Filament\Resources\EventTableResource\Pages;

use App\Filament\Resources\EventTableResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListEventTables extends ListRecords
{
    protected static string $resource = EventTableResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
