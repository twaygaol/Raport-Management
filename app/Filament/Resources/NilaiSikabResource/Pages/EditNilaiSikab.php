<?php

namespace App\Filament\Resources\NilaiSikabResource\Pages;

use App\Filament\Resources\NilaiSikabResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditNilaiSikab extends EditRecord
{
    protected static string $resource = NilaiSikabResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
