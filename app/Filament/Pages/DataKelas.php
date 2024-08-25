<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use App\Models\Siswa;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class DataKelas extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.data-kelas';

    protected static ?string $navigationGroup = 'Data Kelas';

    public $siswa;

    public function mount()
    {
        // Mendapatkan kelas_id dari user yang sedang login
        $kelasId = Auth::user()->kelas_id;

        // Mengambil data siswa yang sesuai dengan kelas_id tersebut
        $this->siswa = Siswa::where('kelas_id', $kelasId)->get();
    }

    public static function canView(): bool
    {
        return Gate::allows('view', self::class);
    }

    public static function canAccess(): bool
    {
        return auth()->user()->hasRole('walikelas');
    }
}
