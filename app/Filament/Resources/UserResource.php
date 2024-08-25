<?php

namespace App\Filament\Resources;

use App\Models\User;
use App\Models\Guru;
use App\Models\Siswa;
use App\Models\WaliKelas;
use App\Models\Kelas;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Form;
use App\Filament\Resources\UserResource\Pages;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-user';

    protected static ?string $navigationGroup = 'Pengaturan';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('hak_akses')
                    ->label('Hak Akses')
                    ->options([
                        'Guru' => 'Guru',
                        'Siswa' => 'Siswa',
                        'Wali Kelas' => 'Wali Kelas',
                    ])
                    ->reactive()
                    ->required(),

                // Select untuk Nama, menyesuaikan dengan Hak Akses yang dipilih
                Select::make('entity_id') // Menggunakan entity_id untuk memilih entitas berdasarkan hak akses
                    ->label('Nama')
                    ->options(function (callable $get) {
                        $hakAkses = $get('hak_akses');

                        if ($hakAkses === 'Guru') {
                            return Guru::pluck('name', 'id');
                        } elseif ($hakAkses === 'Siswa') {
                            return Siswa::pluck('name', 'id');
                        } elseif ($hakAkses === 'Wali Kelas') {
                            return WaliKelas::pluck('name', 'id');
                        }

                        return [];
                    })
                    ->afterStateUpdated(function ($state, callable $set, callable $get) {
                        $hakAkses = $get('hak_akses');

                        if ($hakAkses === 'Guru') {
                            $set('name', Guru::find($state)->name);
                        } elseif ($hakAkses === 'Siswa') {
                            $set('name', Siswa::find($state)->name);
                        } elseif ($hakAkses === 'Wali Kelas') {
                            $set('name', WaliKelas::find($state)->name);
                        }
                    })
                    ->searchable()
                    ->required(),

                // Menyimpan nama yang dipilih ke kolom name
                TextInput::make('name')
                    ->label('Nama')
                    ->disabled() // Field ini diisi secara otomatis oleh Select di atas
                    ->required(),

                TextInput::make('nisn')
                    ->label('Nisn/Nuptk')
                    ->required(),

                // Input tambahan untuk Kelas, hanya muncul jika hak akses adalah Wali Kelas
                Select::make('kelas_id')
                    ->label('Kelas')
                    ->options(Kelas::pluck('kelas', 'id')->toArray())
                    ->visible(fn (callable $get) => $get('hak_akses') === 'Wali Kelas')
                    ->required(),

                // Select untuk Role, menyesuaikan dengan Hak Akses yang dipilih
                Select::make('roles')
                    ->label('Role')
                    ->relationship('roles', 'name')
                    ->preload()
                    ->searchable()
                    ->reactive()
                    ->required(),

                TextInput::make('email')
                    ->required()
                    ->maxLength(255)
                    ->email(),

                TextInput::make('password')
                    ->password()
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')->label('Nama'),
                Tables\Columns\TextColumn::make('email')->label('Email'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
