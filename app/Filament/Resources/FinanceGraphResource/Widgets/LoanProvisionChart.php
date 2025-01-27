<?php

namespace App\Filament\Resources\FinanceGraphResource\Widgets;

use App\Models\Finance;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;
use Filament\Widgets\ChartWidget;

class LoanProvisionChart extends ChartWidget
{
    protected static ?string $heading = 'Loan Provisions';
    protected $yearRange;

    protected function getData(): array
    {

        $loans = Trend::query(Finance::where('description', 'Loan Provisions (in million)'))
        ->dateColumn('date')
        ->between(
            start: now()->startOfYear(),
            end: now()->subMonth()->endOfMonth(),
        )
        ->perMonth()
        ->average('data');


        $labels = $loans->map(function (TrendValue $trendValue) {
            return \Carbon\Carbon::parse($trendValue->date)->format('M'); // Formatting date as "Feb 2024"
        });

        $years = $loans->map(function (TrendValue $value) {
            return \Carbon\Carbon::parse($value->date)->year;
        })->unique();

        $latestYear = $years->last();

        // Store the year range in the class property
        $this->yearRange = '[' . $latestYear . ']';
        static::$heading = 'Loan Provisions ' . $this->yearRange;

        return [
            'datasets' => [

                [
                    'label' => 'Loan Provisions (million)',
                    'data' => $loans->map(fn (TrendValue $value) => $value->aggregate),
                    'backgroundColor' => '#268FE9',
                    'borderColor' => '#268FE9',
                    'pointBackgroundColor' => '#268FE9', // Color for inner dots
                    'pointBorderColor' => '#268FE9',

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
                ],
                'y' => [
                    'type' => 'linear',
                    'position' => 'left',
                    'title' => [
                        'display' => true,
                        'text' => 'Loan Provisions (million)',
                        'font' => [
                            'weight' => 'bold', // Make the title text bold
                        ],
                    ],
                ],

            ],
        ];
    }

    public function getColumns(): int
    {
        return 12; // Full span (usually in a 12-column grid)
    }

    protected function getType(): string
    {
        return 'bar';
    }

}

