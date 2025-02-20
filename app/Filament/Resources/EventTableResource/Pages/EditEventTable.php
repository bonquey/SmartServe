<?php

namespace App\Filament\Resources\EventTableResource\Pages;

use App\Filament\Resources\EventTableResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditEventTable extends EditRecord
{
    protected static string $resource = EventTableResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
