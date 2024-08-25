<?php

namespace App\Filament\Resources\NilaiSikabResource\Pages;

use App\Filament\Resources\NilaiSikabResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListNilaiSikabs extends ListRecords
{
    protected static string $resource = NilaiSikabResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
