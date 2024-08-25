<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use App\Models\Nilai;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class DaftarNilai extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static ?string $navigationGroup = 'Data Nilai Siswa';

    protected static string $view = 'filament.pages.daftar-nilai';

    public $nilai;

    public function mount()
    {
        // Mengambil nisn siswa yang sedang login
        $nisn = Auth::user()->nisn;

        // Menampilkan nilai berdasarkan nisn siswa dan status approval
        $this->nilai = Nilai::with(['siswa'])
            ->whereHas('siswa', function ($query) use ($nisn) {
                $query->where('nisn', $nisn);
            })
            ->where('is_approved', true) // Pastikan nilai sudah disetujui
            ->get();

        // Debugging untuk memastikan data terambil
        // dd($this->nilai);
    }

    public static function canView(): bool
    {
        return Gate::allows('view', self::class);
    }

    public static function canAccess(): bool
    {
        // Membatasi akses ke halaman ini hanya untuk siswa
        return auth()->user()->hasRole('siswa');
    }
}
