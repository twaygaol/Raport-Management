<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MengajarResource\Pages;
use App\Filament\Resources\MengajarResource\RelationManagers;
use App\Models\Mengajar;
use App\Models\TahunAkademik;
use App\Models\Guru;
use App\Models\Kelas;
use App\Models\Mapel;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class MengajarResource extends Resource
{
    protected static ?string $model = Mengajar::class;

    protected static ?string $navigationIcon = 'heroicon-o-book-open';

    protected static ?string $navigationGroup = 'Konfigurasi';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('id_tahunakademik')
                    ->relationship('tahun_akademik', 'tahun_akademik')
                    ->required(),
                Forms\Components\TextInput::make('semester')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Select::make('id_guru')
                    ->label('Guru')
                    ->options(Guru::all()->pluck('nama', 'id'))
                    ->required(),
                Forms\Components\Select::make('id_kelas')
                    ->label('Kelas')
                    ->options(Kelas::all()->pluck('kelas', 'id'))
                    ->required(),
                Forms\Components\Select::make('id_mapel')
                    ->label('Mata Pelajaran')
                    ->options(Mapel::all()->pluck('name_mapel', 'id'))
                    ->required(),
                Forms\Components\TextInput::make('item')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('kkm')
                    ->numeric()
                    ->required()
                    ->maxLength(5)
                    ->placeholder('Masukkan KKM'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('tahun_akademik.tahun_akademik'),
                Tables\Columns\TextColumn::make('semester'),
                Tables\Columns\TextColumn::make('guru.nama'),
                Tables\Columns\TextColumn::make('kelas.kelas'),
                Tables\Columns\TextColumn::make('mapel.name_mapel'),
                Tables\Columns\TextColumn::make('item'),
                Tables\Columns\TextColumn::make('kkm')->numeric(),
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
            'index' => Pages\ListMengajars::route('/'),
            'create' => Pages\CreateMengajar::route('/create'),
            'edit' => Pages\EditMengajar::route('/{record}/edit'),
        ];
    }
}
