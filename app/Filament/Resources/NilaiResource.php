<?php
namespace App\Filament\Resources;

use App\Filament\Resources\NilaiResource\Pages;
use App\Models\Nilai;
use App\Models\Siswa;
use App\Models\Mapel;
use App\Models\Kelas;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use Filament\Notifications\Notification;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

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
                    ->relationship('tahun_akademik', 'tahun_akademik')
                    ->required(),
                Forms\Components\Select::make('id_kelas')
                    ->relationship('kelas', 'kelas')
                    ->required(),
                Forms\Components\Select::make('id_mapel')
                    ->relationship('mapel', 'name_mapel')
                    ->required(),
                Forms\Components\Select::make('kikd')
                    ->relationship('mapel', 'kikd_mapel')
                    ->required(),
                Forms\Components\Select::make('siswa_id')
                    ->relationship('siswa', 'name')
                    ->required(),
                Forms\Components\TextInput::make('nisn')
                    ->numeric()
                    ->required()
                    ->label('NISN'),
                Forms\Components\Select::make('guru_id')
                    ->relationship('guru', 'name')
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
                Forms\Components\Checkbox::make('is_approved')
                    ->label('Approved')
                    ->hidden(fn () => !Auth::user()->hasRole('admin'))
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('tahun_akademik.tahun_akademik')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('mapel.kikd_mapel')->label('KIKD Mapel'),
                Tables\Columns\TextColumn::make('kelas.kelas'),
                Tables\Columns\TextColumn::make('mapel.name_mapel'),
                Tables\Columns\TextColumn::make('siswa.name')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('nisn'),
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
                Tables\Columns\TextColumn::make('is_approved')
                    ->label('Approved')
                    ->formatStateUsing(fn ($state) => $state ? 'Yes' : 'No'),
            ])
            ->filters([
                SelectFilter::make('mapel')
                    ->label('Filter by Mapel')
                    ->relationship('mapel', 'name_mapel')
                    ->options(Mapel::all()->pluck('name_mapel', 'id')->toArray()),
                SelectFilter::make('kelas')
                    ->label('Filter by Kelas')
                    ->relationship('kelas', 'kelas')
                    ->options(Kelas::all()->pluck('kelas', 'id')->toArray()),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\ViewAction::make(),
                Tables\Actions\Action::make('approve')
                    ->label('Approve')
                    ->icon('heroicon-o-check')
                    ->color('success')
                    ->hidden(fn() => !Auth::user()->hasRole('admin'))
                    ->action(function (Nilai $record) {
                        // Update approval status
                        $record->update(['is_approved' => true]);
                        // Send a notification
                        Notification::make()
                            ->title('Nilai berhasil disetujui')
                            ->success()
                            ->send();
                    }),
                Tables\Actions\Action::make('improve')
                    ->label('Improve')
                    ->icon('heroicon-o-cog')
                    ->color('warning')
                    ->hidden(fn() => !Auth::user()->hasRole('admin'))
                    ->action(function (Nilai $record) {
                        $record->update(['is_approved' => false]);
                    }),
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


                         Log::info('Mencoba mengirim email ke: ' . $email);

                        return response()->streamDownload(fn () => print($pdf->output()), "Nilai_{$record->siswa->name}.pdf");
                    })
                    ->color('success'),
                Tables\Actions\Action::make('sendEmail')
                    ->label('Kirim Email')
                    ->icon('heroicon-o-envelope')
                    ->color('primary')
                    ->hidden(fn() => !Auth::user()->hasRole('admin'))
                    ->action(function (Nilai $record) {
                        $siswa = $record->siswa;
                        $email = $siswa->email;
                
                        Log::info('Mencoba mengirim email ke: ' . $email);
                
                        if ($email) {
                            Mail::send('emails.nilai-siswa', ['nilai' => $record], function ($message) use ($email) {
                                $message->to($email)
                                    ->subject('Hasil Studi Siswa');
                            });
                
                            Log::info('Email berhasil dikirim.');
                
                            Notification::make()
                                ->title('Email berhasil dikirim ke orang tua siswa')
                                ->success()
                                ->send();
                        } else {
                            Log::warning('Email gagal dikirim. Siswa tidak memiliki alamat email.');
                
                            Notification::make()
                                ->title('Email gagal dikirim. Siswa tidak memiliki alamat email.')
                                ->danger()
                                ->send();
                        }
                    }),
                ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    Tables\Actions\Action::make('approveAll')
                        ->label('Approve All')
                        ->action(fn(Collection $records) => $records->each->update(['is_approved' => true])),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
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
