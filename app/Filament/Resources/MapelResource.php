<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MapelResource\Pages;
use App\Filament\Resources\MapelResource\RelationManagers;
use App\Models\Mapel;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class MapelResource extends Resource
{
    protected static ?string $model = Mapel::class;

    protected static ?string $navigationIcon = 'heroicon-o-book-open';

    protected static ?string $navigationGroup = 'Konfigurasi';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('kikd_mapel')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('name_mapel')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('kikd_mapel'),
                Tables\Columns\TextColumn::make('name_mapel'),
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
            'index' => Pages\ListMapels::route('/'),
            'create' => Pages\CreateMapel::route('/create'),
            'edit' => Pages\EditMapel::route('/{record}/edit'),
        ];
    }
}
