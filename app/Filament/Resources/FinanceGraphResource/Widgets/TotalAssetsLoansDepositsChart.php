<?php

namespace App\Filament\Resources\FinanceGraphResource\Widgets;

use App\Models\Finance;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;
use Filament\Widgets\ChartWidget;

class TotalAssetsLoansDepositsChart extends ChartWidget
{
    protected static ?string $heading = 'Total Assets, Loans & Deposits';
    protected $yearRange;

    protected function getData(): array
    {
        $assets = Trend::query(Finance::where('description', 'Total Assets (in million)'))
        ->dateColumn('date')
        ->between(
            start: now()->startOfYear(),
            end: now()->subMonth()->endOfMonth(),
        )
        ->perMonth()
        ->average('data');

        $loans = Trend::query(Finance::where('description', 'Total Loans (in million)'))
        ->dateColumn('date')
        ->between(
            start: now()->startOfYear(),
            end: now()->subMonth()->endOfMonth(),
        )
        ->perMonth()
        ->average('data');

        $deposits = Trend::query(Finance::where('description', 'Total Deposit (in million)'))
        ->dateColumn('date')
        ->between(
            start: now()->startOfYear(),
            end: now()->subMonth()->endOfMonth(),
        )
        ->perMonth()
        ->average('data');


        $labels = $assets->map(function (TrendValue $trendValue) {
            return \Carbon\Carbon::parse($trendValue->date)->format('M'); // Formatting date as "Feb 2024"
        });

        $years = $assets->map(function (TrendValue $value) {
            return \Carbon\Carbon::parse($value->date)->year;
        })->unique();

        $latestYear = $years->last();

        // Store the year range in the class property
        $this->yearRange = '[' . $latestYear . ']';
        static::$heading = 'Total Assets, Loans & Deposits ' . $this->yearRange;

        return [
            'datasets' => [

                [
                    'label' => 'Total Assets (million)',
                    'data' => $assets->map(fn (TrendValue $value) => $value->aggregate),
                    'backgroundColor' => '#268FE9',
                    'borderColor' => '#268FE9',
                    'pointBackgroundColor' => '#268FE9', // Color for inner dots
                    'pointBorderColor' => '#268FE9',

                ],
                [
                    'label' => 'Total Loans (million)',
                    'data' => $loans->map(fn (TrendValue $value) => $value->aggregate),
                    'backgroundColor' => ' #F40000',
                    'borderColor' => ' #F40000',
                    'pointBackgroundColor' => ' #F40000', // Color for inner dots
                    'pointBorderColor' => ' #F40000',

                ],
                [
                    'label' => 'Total Deposits (million)',
                    'data' => $deposits->map(fn (TrendValue $value) => $value->aggregate),
                    'backgroundColor' => '#252d60',
                    'borderColor' => '#252d60',
                    'pointBackgroundColor' => '#252d60', // Color for inner dots
                    'pointBorderColor' => '#252d60',

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
                        'text' => 'Asset/Loan/Deposit (million)',
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
