<?php

namespace App\Filament\Resources;

use App\Filament\Resources\NilaiSikabResource\Pages;
use App\Filament\Resources\NilaiSikabResource\RelationManagers;
use App\Models\Sikab;
use Filament\Forms;
use App\Models\Siswa;
use App\Models\Kelas;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class NilaiSikabResource extends Resource
{
    protected static ?string $model = Sikab::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Data Nilai';

    protected static ?string $navigationLabel = 'Nilai Sikab';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('siswa_id')
                    ->relationship('siswa', 'name')
                    ->label('Nama Siswa')
                    ->required(),
                Forms\Components\Select::make('nisn')
                    ->relationship('siswa', 'nisn')
                    ->label('NISN')
                    ->required(),
                Forms\Components\Select::make('kelas_id')
                    ->relationship('kelas', 'kelas')
                    ->required(),

                Forms\Components\TextInput::make('sikab')->required(),
                Forms\Components\TextInput::make('etika')->required(),
                Forms\Components\TextInput::make('rangking')->required()->numeric(),
            ]);
    }
    
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('siswa.name')
                    ->sortable()
                    ->label('Nama Siswa')
                    ->searchable(),
                Tables\Columns\TextColumn::make('siswa.nisn')
                    ->sortable()
                    ->label('NISN')
                    ->searchable(),
                Tables\Columns\TextColumn::make('kelas.kelas')
                    ->sortable()
                    ->searchable()
                    ->label('Kelas'),
                Tables\Columns\TextColumn::make('sikab')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('etika')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('rangking')
                    ->sortable()
                    ->searchable()
                    ->extraAttributes(['class' => 'text-blue-500'])
            ])
            ->filters([
                Tables\Filters\Filter::make('rangking')
                    ->label('Rangking')
                    ->form([
                        Forms\Components\TextInput::make('rangking_min')
                            ->label('Minimum Rangking')
                            ->numeric()
                            ->placeholder('Enter minimum ranking'),
                        Forms\Components\TextInput::make('rangking_max')
                            ->label('Maximum Rangking')
                            ->numeric()
                            ->placeholder('Enter maximum ranking'),
                    ])
                    ->query(function (Builder $query, array $data) {
                        if (isset($data['rangking_min'])) {
                            $query->where('rangking', '>=', $data['rangking_min']);
                        }
                        if (isset($data['rangking_max'])) {
                            $query->where('rangking', '<=', $data['rangking_max']);
                        }
                    }),
                
                Tables\Filters\Filter::make('kelas')
                    ->label('Kelas')
                    ->form([
                        Forms\Components\Select::make('kelas_id')
                            ->label('Select Kelas')
                            ->options(Kelas::all()->pluck('kelas', 'id'))
                            ->placeholder('Select a Kelas')
                    ])
                    ->query(function (Builder $query, array $data) {
                        if (isset($data['kelas_id'])) {
                            $query->where('kelas_id', $data['kelas_id']);
                        }
                    }),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
                Tables\Actions\RestoreAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    Tables\Actions\RestoreBulkAction::make(),
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
            'index' => Pages\ListNilaiSikabs::route('/'),
            'create' => Pages\CreateNilaiSikab::route('/create'),
            'edit' => Pages\EditNilaiSikab::route('/{record}/edit'),
        ];
    }
}
