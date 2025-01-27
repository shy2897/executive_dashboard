<?php

namespace App\Filament\Resources\HRMGraphResource\Widgets;

use Filament\Widgets\ChartWidget;
use App\Models\HRM;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;

class TotalEmployee extends ChartWidget
{
    protected static ?string $heading = 'Total Employee';
    protected $yearRange;

    protected function getData(): array
    {
        $employee = Trend::query(HRM::where('description', 'Total no. of Employees at End of Month: (a+b)-c'))
        ->dateColumn('date')
        ->between(
            start: now()->startOfYear(),
            end: now()->subMonth()->endOfMonth(),
        )
        ->perMonth()
        ->average('data');


        $labels = $employee->map(function (TrendValue $trendValue) {
            return \Carbon\Carbon::parse($trendValue->date)->format('M'); // Formatting date as "Feb 2024"
        });

        $years = $employee->map(function (TrendValue $value) {
            return \Carbon\Carbon::parse($value->date)->year;
        })->unique();

        $latestYear = $years->last();

        // Store the year range in the class property
        $this->yearRange = '[' . $latestYear . ']';
        static::$heading = 'Total Employees ' . $this->yearRange;

        return [
            'datasets' => [
                [
                    'label' => 'Total Employees',
                    'data' => $employee->map(fn (TrendValue $value) => $value->aggregate),
                    'backgroundColor' => '#268FE9',
                    'borderColor' => '#268FE9',
                    'pointBackgroundColor' => '#268FE9', // Color for inner dots
                    'pointBorderColor' => '#268FE9',
                    'yAxisID' => 'y', // Assign to the first y-axis
                ],
            ],
            'labels' => $labels->all(),
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
                    'position' => 'left',
                    'title' => [
                        'display' => true,
                        'text' => 'No of Employees',
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
        return 'bar';
    }
}
