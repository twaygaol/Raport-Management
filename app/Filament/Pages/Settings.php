<?php

namespace App\Filament\Pages;

use Filament\Forms;
use App\Models\Siswa;
use Filament\Pages\Page;
use Illuminate\Support\Facades\Auth;
use Filament\Notifications\Notification;
use Illuminate\Support\Facades\Gate;

class Settings extends Page
{
    protected static ?string $navigationLabel = 'Profil Siswa';
    protected static ?string $title = 'Data Siswa';
    protected static ?string $navigationIcon = 'heroicon-o-user';
    protected static string $view = 'filament.pages.settings';

    // Define the properties for the form fields
    public $nik;
    public $tmp_lhr;
    public $tgl_lhr;
    public $jk;
    public $hobi;
    public $cita_cita;
    public $sts_anak;
    public $jml_saudara;
    public $anak_ke;
    public $nama_ibu;
    public $pekerjaan_ibu;
    public $nama_ayah;
    public $pekerjaan_ayah;
    public $nama_wali;
    public $pekerjaan_wali;
    public $siswa;
    public $isEditing = false;

    public function mount()
    {
        $this->siswa = Siswa::where('nisn', Auth::user()->nisn)->first();

        if ($this->siswa) {
            // Convert date string to Carbon instance if needed
            $this->siswa->tgl_lhr = $this->siswa->tgl_lhr ? \Carbon\Carbon::parse($this->siswa->tgl_lhr) : null;

            $this->fill($this->siswa->only([
                'nik', 'tmp_lhr', 'tgl_lhr', 'jk', 'hobi', 'cita_cita',
                'sts_anak', 'jml_saudara', 'anak_ke', 'nama_ibu', 'pekerjaan_ibu',
                'nama_ayah', 'pekerjaan_ayah', 'nama_wali', 'pekerjaan_wali'
            ]));
        } else {
            $this->fill([
                'nik' => '',
                'tmp_lhr' => '',
                'tgl_lhr' => null,
                'jk' => '',
                'hobi' => '',
                'cita_cita' => '',
                'sts_anak' => '',
                'jml_saudara' => '',
                'anak_ke' => '',
                'nama_ibu' => '',
                'pekerjaan_ibu' => '',
                'nama_ayah' => '',
                'pekerjaan_ayah' => '',
                'nama_wali' => '',
                'pekerjaan_wali' => '',
            ]);
        }
    }

    protected function getFormSchema(): array
    {
        return [
            Forms\Components\TextInput::make('nik')
                ->label('NIK')
                ->required(),
            Forms\Components\TextInput::make('tmp_lhr')
                ->label('Tempat Lahir')
                ->required(),
            Forms\Components\DatePicker::make('tgl_lhr')
                ->label('Tanggal Lahir')
                ->required(),
            Forms\Components\Select::make('jk')
                ->label('Jenis Kelamin')
                ->options([
                    'L' => 'Laki-laki',
                    'P' => 'Perempuan'
                ])
                ->required(),
            Forms\Components\TextInput::make('hobi')
                ->label('Hobi'),
            Forms\Components\TextInput::make('cita_cita')
                ->label('Cita-cita'),
            Forms\Components\Select::make('sts_anak')
                ->label('Status Anak')
                ->options([
                    'Kandung' => 'Kandung',
                    'Angkat' => 'Angkat',
                    'Tiri' => 'Tiri'
                ]),
            Forms\Components\TextInput::make('jml_saudara')
                ->label('Jumlah Saudara'),
            Forms\Components\TextInput::make('anak_ke')
                ->label('Anak Ke'),
            Forms\Components\TextInput::make('nama_ibu')
                ->label('Nama Ibu'),
            Forms\Components\TextInput::make('pekerjaan_ibu')
                ->label('Pekerjaan Ibu'),
            Forms\Components\TextInput::make('nama_ayah')
                ->label('Nama Ayah'),
            Forms\Components\TextInput::make('pekerjaan_ayah')
                ->label('Pekerjaan Ayah'),
            Forms\Components\TextInput::make('nama_wali')
                ->label('Nama Wali'),
            Forms\Components\TextInput::make('pekerjaan_wali')
                ->label('Pekerjaan Wali'),
        ];
    }

    public function submit()
    {
        $data = $this->form->getState();

        $nisn = Auth::user()->nisn;

        $siswa = Siswa::where('nisn', $nisn)->first();

        if ($siswa) {
            $siswa->update($data);
        } else {
            Siswa::create(array_merge($data, ['nisn' => $nisn]));
        }

        Notification::make()
            ->title('Profil berhasil diperbarui.')
            ->success()
            ->send();
    }

    public function startEditing()
    {
        $this->isEditing = true;
    }

    // Add a method to stop editing
    public function stopEditing()
    {
        $this->isEditing = false;
    }

    public static function canView(): bool
    {
        return Gate::allows('view', self::class);
    }

    public static function canAccess(): bool
    {
        return auth()->user()->hasRole('siswa');
    }
}
