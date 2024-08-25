<?php
namespace App\Filament\Pages;

use Filament\Forms;
use Filament\Pages\Page;
use App\Models\Kelas;
use App\Models\Nilai;
use App\Models\Siswa;
use Barryvdh\DomPDF\Facade\Pdf;

class CetakNilai extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-printer';
    protected static ?string $navigationLabel = 'Cetak Nilai';
    protected static ?string $navigationGroup = 'Laporan';

    protected static string $view = 'filament.pages.cetak-nilai';

    public $kelas_id;
    public $siswa_id;
    public $mapel;

    protected function getFormSchema(): array
    {
        return [
            Forms\Components\Select::make('kelas_id')
                ->label('Pilih Kelas')
                ->options(Kelas::all()->pluck('kelas', 'id'))
                ->reactive()
                ->required()
                ->afterStateUpdated(fn ($state, callable $set) => $set('siswa_id', null)),

            Forms\Components\Select::make('siswa_id')
                ->label('Pilih Siswa')
                ->options(function (callable $get) {
                    $kelasId = $get('kelas_id');
                    if ($kelasId) {
                        return Siswa::where('kelas_id', $kelasId)->pluck('nama', 'id');
                    }
                    return [];
                })
                ->required(),
        ];
    }

    public function submit()
    {
        $siswa = Siswa::find($this->siswa_id);
        $nilai = Nilai::where('siswa_id', $this->siswa_id)->with('mapel')->get();

        $pdf = Pdf::loadView('filament.pages.cetak-nilai-pdf', [
            'siswa' => $siswa,
            'nilai' => $nilai,
        ]);

        return response()->streamDownload(fn () => print($pdf->output()), "Nilai_{$siswa->nama}.pdf");
    }

    public static function canView(): bool
    {
        return Gate::allows('view', self::class);
    }
    
    public static function canAccess(): bool
    {
        // Membatasi akses ke halaman ini hanya untuk superadmin
        return auth()->user()->hasRole('super_admin');
    }
}
