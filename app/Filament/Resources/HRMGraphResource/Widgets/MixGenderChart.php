<?php

namespace App\Filament\Resources\HRMGraphResource\Widgets;

use Carbon\Carbon;
use App\Models\HRM;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;
use Filament\Widgets\ChartWidget;

class MixGenderChart extends ChartWidget
{
    protected static ?string $heading = 'Employee Gender Split Chart';
    protected static ?string $maxHeight = '255px';

    protected function getData(): array
    {
        $latestMale = HRM::where('description', 'Percentage of Male Employees')->max('date');
        $startMale = Carbon::parse($latestMale)->startOfMonth();
        $endMale = Carbon::parse($latestMale)->endOfMonth();
        $male = HRM::where('description', 'Percentage of Male Employees')
        ->whereBetween('date', [
            $startMale, // Start of the latest month with data
            $endMale    // End of the latest month with data
        ])
        ->sum('data');


        $latestFemale = HRM::where('description', 'Percentage of Female Employees')->max('date');
        $startFemale = Carbon::parse($latestFemale)->startOfMonth();
        $endFemale = Carbon::parse($latestFemale)->endOfMonth();
        $female = HRM::where('description', 'Percentage of Female Employees')
        ->whereBetween('date', [
            $startFemale, // Start of the latest month with data
            $endFemale    // End of the latest month with data
        ])
        ->sum('data');

        // Extract the month and year
        $carbonDate = Carbon::parse($latestMale);
        $months = $carbonDate->format('M'); // 'm' gives the month in two-digit format (e.g., '01' for January)
        $years = $carbonDate->format('Y'); // 'Y' gives the full year (e.g., '2024')

        static::$heading = 'Employee Gender Split Chart [' . $months . '-' . $years . ']';

        return [
            'datasets' => [
                [
                    'label' => 'My First Dataset',
                    'data' => [$female, $male],
                    'backgroundColor' => [
                        '#f40000',
                        '#268FE9',
                    ],
                    'hoverOffset' => 2,
                ],
            ],
            'labels' => ['Female(%)', 'Male(%)'],
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
        return 'doughnut';
    }

}
