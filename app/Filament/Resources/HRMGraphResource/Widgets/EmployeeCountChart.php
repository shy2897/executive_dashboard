<?php

namespace App\Filament\Resources\HRMGraphResource\Widgets;

use Filament\Widgets\ChartWidget;
use App\Models\HRM;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;

class EmployeeCountChart extends ChartWidget
{
    protected static ?string $heading = 'Head Count Chart';
    protected $yearRange;

    protected function getData(): array
    {
        $recruited = Trend::query(HRM::where('description', 'No. of employees recruited during the month'))
        ->dateColumn('date')
        ->between(
            start: now()->startOfYear(),
            end: now()->subMonth()->endOfMonth(),
        )
        ->perMonth()
        ->average('data');

        $separated = Trend::query(HRM::where('description', 'No. of employees separated during the month'))
        ->dateColumn('date')
        ->between(
            start: now()->startOfYear(),
            end: now()->subMonth()->endOfMonth(),
        )
        ->perMonth()
        ->average('data');

        $labels = $recruited->map(function (TrendValue $trendValue) {
            return \Carbon\Carbon::parse($trendValue->date)->format('M'); // Formatting date as "Feb 2024"
        });

        $years = $recruited->map(function (TrendValue $value) {
            return \Carbon\Carbon::parse($value->date)->year;
        })->unique();

        $latestYear = $years->last();

        // Store the year range in the class property
        $this->yearRange = '[' . $latestYear . ']';
        static::$heading = 'Head Count Over Time ' . $this->yearRange;

        return [
            'datasets' => [
                [
                    'label' => 'Employee Recruited',
                    'data' => $recruited->map(fn (TrendValue $value) => $value->aggregate),
                    'backgroundColor' => '#268FE9',
                    'borderColor' => '#268FE9',
                    'pointBackgroundColor' => '#268FE9', // Color for inner dots
                    'pointBorderColor' => '#268FE9',
                    'yAxisID' => 'y', // Assign to the first y-axis
                ],
                [
                    'label' => 'Employee Separated',
                    'data' => $separated->map(fn (TrendValue $value) => $value->aggregate),
                    'backgroundColor' => '#f40000',
                    'borderColor' => '#f40000',
                    'pointBackgroundColor' => '#f40000', // Color for inner dots
                    'pointBorderColor' => '#f40000',
                    'type' => 'bar',
                    'yAxisID' => 'y', // Assign to the second y-axis
                ]
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
