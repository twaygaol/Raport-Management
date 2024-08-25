<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use App\Models\Mengajar;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class JadwalMengajar extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-book-open';

    protected static string $view = 'filament.pages.jadwal-mengajar';

    protected static ?string $navigationGroup = 'Data Mengajar';

    public $mengajar;

    public function mount()
    {
        // Mengambil nisn siswa yang sedang login
        $nisn = Auth::user()->nisn;

        // Menampilkan nilai berdasarkan nisn siswa
        $this->mengajar = mengajar::with(['guru'])
            ->whereHas('guru', function ($query) use ($nisn) {
                $query->where('nisn', $nisn);
            })
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
        return auth()->user()->hasRole('guru');
    }
}
