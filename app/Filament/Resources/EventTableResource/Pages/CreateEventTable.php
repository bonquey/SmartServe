<?php

namespace App\Filament\Resources\EventTableResource\Pages;

use App\Filament\Resources\EventTableResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateEventTable extends CreateRecord
{
    protected static string $resource = EventTableResource::class;
}
