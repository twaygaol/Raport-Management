<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use App\Models\User;
use App\Models\Guru;
use App\Models\Siswa;
use App\Models\WaliKelas;
use Filament\Resources\Pages\CreateRecord;

class CreateUser extends CreateRecord
{
    protected static string $resource = UserResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $hakAkses = $data['hak_akses'];
        $entityId = $data['entity_id'];

        if ($hakAkses === 'Guru') {
            $data['name'] = Guru::find($entityId)->name;
        } elseif ($hakAkses === 'Siswa') {
            $data['name'] = Siswa::find($entityId)->name;
        } elseif ($hakAkses === 'Wali Kelas') {
            $data['name'] = WaliKelas::find($entityId)->name;
        }

        return $data;
    }
}
