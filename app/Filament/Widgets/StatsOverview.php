<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\Siswa;
use App\Models\Guru;
use App\Models\Walikelas;

class StatsOverview extends BaseWidget
{

    protected static ?string $pollingInterval = null ;

    protected function getStats(): array

    {
        return [
         Stat::make('Total Siswa', Siswa::count())
            ->description('Data kesuluhan Siswa')
            ->descriptionIcon('heroicon-m-arrow-trending-up')
            ->color('success')
            ->chart([7, 3, 4, 5, 6, 3, 5, 3]),
         Stat::make('Total Guru', Guru::count())
            ->description('Data keseluruhan Guru')
            ->descriptionIcon('heroicon-m-arrow-trending-up')
            ->color('danger')
            ->chart([7, 3, 4, 5, 6, 3, 5, 3]),
         Stat::make('Total WaliKelas', WaliKelas::count())
            ->description('Data keseluruhan walikelas')
            ->descriptionIcon('heroicon-m-arrow-trending-up')
            ->color('primary')
            ->chart([7, 3, 4, 5, 6, 3, 5, 3]),

        ];
    }
}
