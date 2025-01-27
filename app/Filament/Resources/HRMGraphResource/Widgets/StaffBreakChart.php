<?php

namespace App\Filament\Resources\HRMGraphResource\Widgets;

use Carbon\Carbon;
use App\Models\HRM;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;
use Filament\Widgets\ChartWidget;

class StaffBreakChart extends ChartWidget
{
    protected static ?string $heading = 'Staff Breakup Chart';
    protected static ?string $maxHeight = '255px';

    protected function getData(): array
    {
        $latestCore = HRM::where('description', 'Percentage of Employees in Core Functions')->max('date');
        $startCore = Carbon::parse($latestCore)->startOfMonth();
        $endCore = Carbon::parse($latestCore)->endOfMonth();
        $core = HRM::where('description', 'Percentage of Employees in Core Functions')
        ->whereBetween('date', [
            $startCore, // Start of the latest month with data
            $endCore    // End of the latest month with data
        ])
        ->sum('data');

        $latestSupport = HRM::where('description', 'Percentage of Employees in Support Functions')->max('date');
        $startSupport = Carbon::parse($latestSupport)->startOfMonth();
        $endSupport = Carbon::parse($latestSupport)->endOfMonth();
        $support = HRM::where('description', 'Percentage of Employees in Support Functions')
        ->whereBetween('date', [
            $startSupport, // Start of the latest month with data
            $endSupport    // End of the latest month with data
        ])
        ->sum('data');

        // Extract the month and year
        $carbonDate = Carbon::parse($latestCore);
        $months = $carbonDate->format('M'); // 'm' gives the month in two-digit format (e.g., '01' for January)
        $years = $carbonDate->format('Y'); // 'Y' gives the full year (e.g., '2024')

        static::$heading = 'Staff Breakup Chart [' . $months . '-' . $years . ']';

        return [
            'datasets' => [
                [
                    'label' => 'My First Dataset',
                    'data' => [$support, $core],
                    'backgroundColor' => [
                        '#f40000',
                        '#268FE9',

                    ],
                    'hoverOffset' => 2,
                ],
            ],
            'labels' => ['Support(%)', 'Core(%)'],
        ];
    }

    protected function getOptions(): array
    {
        return [
            'scales' => [
                'x' => [
                    'display' => false,
                    'grid' => [
                        'display' => false, // Remove grid lines for the x-axis
                    ],
                ],
                'y' => [
                    'display' => false,
                    'grid' => [
                        'display' => false,
                    ],

                ],

            ],
        ];
    }

    protected function getType(): string
    {
        return 'pie';
    }

}
