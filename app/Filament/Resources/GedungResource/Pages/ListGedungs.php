<?php

namespace App\Filament\Resources\GedungResource\Pages;

use App\Filament\Resources\GedungResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListGedungs extends ListRecords
{
    protected static string $resource = GedungResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
