<?php

namespace App\Filament\Resources;

use App\Filament\Resources\NilaiResource\Pages;
use App\Filament\Resources\NilaiResource\RelationManagers;
use App\Models\Nilai;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class NilaiResource extends Resource
{
    protected static ?string $model = Nilai::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static ?string $navigationGroup = 'Data Nilai';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('id_tahunakademik')
                    ->relationship('tahun_akademik', 'tahun_akademik') // Pastikan relasi dan kolomnya benar
                    ->required(),
                Forms\Components\Select::make('id_kelas')
                    ->relationship('kelas', 'nama') // Pastikan relasi dan kolomnya benar
                    ->required(),
                Forms\Components\Select::make('id_mapel')
                    ->relationship('mapel', 'name_mapel') // Pastikan relasi dan kolomnya benar
                    ->required(),
                    Forms\Components\Select::make('siswa_id')
                        ->relationship('siswa', 'nama') // Pastikan relasi dan kolomnya benar
                        ->required(),
                    Forms\Components\Select::make('guru_id')
                        ->relationship('guru', 'nama') // Pastikan relasi dan kolomnya benar
                        ->required(),
                    Forms\Components\TextInput::make('nilai_tugas1')
                    ->numeric()
                    ->nullable()
                    ->required()
                    ->placeholder('Masukkan nilai tugas 1'),
                Forms\Components\TextInput::make('nilai_tugas2')
                    ->numeric()
                    ->nullable()
                    ->required()
                    ->placeholder('Masukkan nilai tugas 2'),
                Forms\Components\TextInput::make('nilai_tugas3')
                    ->numeric()
                    ->nullable()
                    ->required()
                    ->placeholder('Masukkan nilai tugas 3'),
                Forms\Components\TextInput::make('nilai_tugas4')
                    ->numeric()
                    ->nullable()
                    ->required()
                    ->placeholder('Masukkan nilai tugas 4'),
                Forms\Components\TextInput::make('nilai_tugas5')
                    ->numeric()
                    ->nullable()
                    ->required()
                    ->placeholder('Masukkan nilai tugas 5'),
                Forms\Components\TextInput::make('nilai_uh1')
                    ->numeric()
                    ->nullable()
                    ->required()
                    ->placeholder('Masukkan nilai UH 1'),
                Forms\Components\TextInput::make('nilai_uh2')
                    ->numeric()
                    ->nullable()
                    ->required()
                    ->placeholder('Masukkan nilai UH 2'),
                Forms\Components\TextInput::make('nilai_uh3')
                    ->numeric()
                    ->nullable()
                    ->required()
                    ->placeholder('Masukkan nilai UH 3'),
                Forms\Components\TextInput::make('nilai_uh4')
                    ->numeric()
                    ->nullable()
                    ->required()
                    ->placeholder('Masukkan nilai UH 4'),
                Forms\Components\TextInput::make('nilai_uh5')
                    ->numeric()
                    ->nullable()
                    ->required()
                    ->placeholder('Masukkan nilai UH 5'),
                Forms\Components\TextInput::make('nilai_uts')
                    ->numeric()
                    ->nullable()
                    ->required()
                    ->placeholder('Masukkan nilai UTS'),
                Forms\Components\TextInput::make('nilai_uas')
                    ->numeric()
                    ->nullable()
                    ->required()
                    ->placeholder('Masukkan nilai UAS'),
                Forms\Components\Select::make('kikd')
                ->relationship('mapel', 'kikd_mapel') // Pastikan relasi dan kolomnya benar
                ->required()
                ->nullable(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('tahun_akademik.tahun_akademik'), // Menampilkan tahun akademik
                Tables\Columns\TextColumn::make('kelas.nama'), // Menampilkan nama kelas
                Tables\Columns\TextColumn::make('mapel.name_mapel'), // Menampilkan nama mapel
                Tables\Columns\TextColumn::make('siswa.nama'), // Menampilkan nama siswa
                Tables\Columns\TextColumn::make('nilai_tugas1')->numeric(),
                Tables\Columns\TextColumn::make('nilai_tugas2')->numeric(),
                Tables\Columns\TextColumn::make('nilai_tugas3')->numeric(),
                Tables\Columns\TextColumn::make('nilai_tugas4')->numeric(),
                Tables\Columns\TextColumn::make('nilai_tugas5')->numeric(),
                Tables\Columns\TextColumn::make('nilai_uh1')->numeric(),
                Tables\Columns\TextColumn::make('nilai_uh2')->numeric(),
                Tables\Columns\TextColumn::make('nilai_uh3')->numeric(),
                Tables\Columns\TextColumn::make('nilai_uh4')->numeric(),
                Tables\Columns\TextColumn::make('nilai_uh5')->numeric(),
                Tables\Columns\TextColumn::make('nilai_uts')->numeric(),
                Tables\Columns\TextColumn::make('nilai_uas')->numeric(),
                Tables\Columns\TextColumn::make('mapel.kikd_mapel')->label('KIKD Mapel'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\Action::make('cetakPdf')
                    ->label('Cetak PDF')
                    ->icon('heroicon-o-printer')
                    ->action(function (Nilai $record) {
                        $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('filament.resource.nilai-resource.pdf', [
                            'nilai' => $record,
                            'siswa' => $record->siswa,
                            'kelas' => $record->kelas,
                            'mapel' => $record->mapel,
                        ]);
    
                        return response()->streamDownload(fn () => print($pdf->output()), "Nilai_{$record->siswa->nama}.pdf");
                    })
                    ->color('success'),
                ])
                ->bulkActions([
                    Tables\Actions\DeleteBulkAction::make(),
                ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListNilais::route('/'),
            'create' => Pages\CreateNilai::route('/create'),
            'edit' => Pages\EditNilai::route('/{record}/edit'),
        ];
    }
}
