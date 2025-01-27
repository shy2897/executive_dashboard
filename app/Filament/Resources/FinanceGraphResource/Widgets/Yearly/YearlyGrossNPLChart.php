<?php

namespace App\Filament\Resources\FinanceGraphResource\Widgets\Yearly;

use App\Models\Finance;
use Flowframe\Trend\Trend;
use Illuminate\Support\Carbon;
use Flowframe\Trend\TrendValue;
use Filament\Widgets\ChartWidget;

class YearlyGrossNPLChart extends ChartWidget
{
    protected static ?string $heading = 'Gross NPL';
    protected $yearRange;

    protected function getData(): array
    {
        $earliestDate = Finance::where('description', 'Gross NPL (%)')
            ->orderBy('date', 'asc')
            ->first()
            ->date;

        // Determine the start and end dates for the query
        $startOfYear = Carbon::parse($earliestDate)->startOfYear(); // Start of the earliest year
        $endDate = Carbon::now()->subMonth()->endOfMonth(); // Previous month end date
        $percentage = Trend::query(Finance::where('description', 'Gross NPL (%)'))
        ->dateColumn('date')
        ->between(
            start: $startOfYear,
            end: $endDate,
        )
        ->perYear()
        ->average('data');

        $value = Trend::query(Finance::where('description', 'Gross NPL (in million)'))
        ->dateColumn('date')
        ->between(
            start: $startOfYear,
            end: $endDate,
        )
        ->perYear()
        ->average('data');

        $years = $value->map(function (TrendValue $value) {
            return \Carbon\Carbon::parse($value->date)->year;
        })->unique();

        $years = $percentage->map(fn (TrendValue $value) => $value->date);
        $firstYear = $years->first();
        $lastYear = $years->last();

        $this->yearRange = '[' . $firstYear . '-' . $lastYear . ']';
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

            'labels' => $percentage->map(fn (TrendValue $value) => $value->date),
        ];
    }

    protected function getOptions(): array
    {
        return [
            'scales' => [
                'x' => [
                    'title' => [
                        'display' => true,
                        'text' => 'Years ' . $this->yearRange,
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
