<?php

namespace App\Filament\Resources\ComestibleResource\Pages;

use App\Filament\Resources\ComestibleResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditComestible extends EditRecord
{
    protected static string $resource = ComestibleResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
