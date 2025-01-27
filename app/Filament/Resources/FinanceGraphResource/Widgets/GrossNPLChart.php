<?php

namespace App\Filament\Resources\FinanceGraphResource\Widgets;

use Filament\Widgets\ChartWidget;
use App\Models\Finance;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;

class GrossNPLChart extends ChartWidget
{
    protected static ?string $heading = 'Gross NPL';
    protected $yearRange;

    protected function getData(): array
    {
        $percentage = Trend::query(Finance::where('description', 'Gross NPL (%)'))
        ->dateColumn('date')
        ->between(
            start: now()->startOfYear(),
            end: now()->subMonth()->endOfMonth(),
        )
        ->perMonth()
        ->average('data');

        $value = Trend::query(Finance::where('description', 'Gross NPL (in million)'))
        ->dateColumn('date')
        ->between(
            start: now()->startOfYear(),
            end: now()->subMonth()->endOfMonth(),
        )
        ->perMonth()
        ->average('data');

        $labels = $value->map(function (TrendValue $trendValue) {
            return \Carbon\Carbon::parse($trendValue->date)->format('M'); // Formatting date as "Feb 2024"
        });

        $years = $value->map(function (TrendValue $value) {
            return \Carbon\Carbon::parse($value->date)->year;
        })->unique();

        $latestYear = $years->last();

        // Store the year range in the class property
        $this->yearRange = '[' . $latestYear . ']';
        static::$heading = 'Gross NPL ' . $this->yearRange;


        return [
            'datasets' => [
                [
                    'label' => 'Gross NPL(%)',
                    'data' => $percentage->map(fn (TrendValue $value) => $value->aggregate),
                    'backgroundColor' => '#f40000',
                    'borderColor' => '#f40000',
                    'pointBackgroundColor' => '#f40000', // Color for inner dots
                    'pointBorderColor' => '#f40000',
                    'yAxisID' => 'y', // Assign to the first y-axis
                ],
                [
                    'label' => 'Gross NPL(million)',
                    'data' => $value->map(fn (TrendValue $value) => $value->aggregate),
                    'backgroundColor' => '#268FE9',
                    'borderColor' => '#268FE9',
                    'type' => 'bar',
                    'yAxisID' => 'y1', // Assign to the second y-axis
                ],


            ],
            'labels' => $labels->all(), // Format date as "Feb 2024",
        ];
    }

    protected function getOptions(): array
    {
        return [
            'scales' => [
                'x' => [
                    'title' => [
                        'display' => true,
                        'text' => 'Months ' . $this->yearRange,
                        'font' => [
                            'weight' => 'bold', // Make the title text bold
                        ],
                    ],
                    'grid' => [
                        'display' => false, // Remove grid lines for the x-axis
                    ],
                ],
                'y' => [
                    'position' => 'right',
                    'title' => [
                        'display' => true,
                        'text' => 'Gross NPL (%)',
                        'font' => [
                            'weight' => 'bold', // Make the title text bold
                        ],
                    ],
                    'grid' => [
                        'color' => 'rgba(128, 128, 128, 0.2)',
                        'borderColor' => 'rgba(128, 128, 128, 0.2)',
                    ],

                ],
                'y1' => [
                    'position' => 'left',
                    'title' => [
                        'display' => true,
                        'text' => 'Gross NPL (million)',
                        'font' => [
                            'weight' => 'bold', // Make the title text bold
                        ],
                    ],
                    'grid' => [
                        'color' => 'rgba(128, 128, 128, 0.2)',
                        'borderColor' => 'rgba(128, 128, 128, 0.2)',
                    ],

                ],
            ],
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
