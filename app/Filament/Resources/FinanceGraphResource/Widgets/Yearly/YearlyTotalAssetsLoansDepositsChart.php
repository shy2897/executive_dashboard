<?php

namespace App\Filament\Resources\FinanceGraphResource\Widgets\Yearly;

use App\Models\Finance;
use Flowframe\Trend\Trend;
use Illuminate\Support\Carbon;
use Flowframe\Trend\TrendValue;
use Filament\Widgets\ChartWidget;

class YearlyTotalAssetsLoansDepositsChart extends ChartWidget
{
    protected static ?string $heading = 'Total Assets, Loans & Deposits';
    protected $yearRange;

    protected function getData(): array
    {
        $earliestDate = Finance::where('description', 'Total Assets (in million)')
            ->orderBy('date', 'asc')
            ->first()
            ->date;

        // Determine the start and end dates for the query
        $startOfYear = Carbon::parse($earliestDate)->startOfYear(); // Start of the earliest year
        $endDate = Carbon::now()->subMonth()->endOfMonth(); // Previous month end date

        $assets = Trend::query(Finance::where('description', 'Total Assets (in million)'))
        ->dateColumn('date')
        ->between(
            start: $startOfYear,
            end: $endDate,
        )
        ->perYear()
        ->average('data');

        $loans = Trend::query(Finance::where('description', 'Total Loans (in million)'))
        ->dateColumn('date')
        ->between(
            start: $startOfYear,
            end: $endDate,
        )
        ->perYear()
        ->average('data');

        $deposits = Trend::query(Finance::where('description', 'Total Deposit (in million)'))
        ->dateColumn('date')
        ->between(
            start: $startOfYear,
            end: $endDate,
        )
        ->perYear()
        ->average('data');

        $years = $assets->map(function (TrendValue $value) {
            return \Carbon\Carbon::parse($value->date)->year;
        })->unique();

        $years = $assets->map(fn (TrendValue $value) => $value->date);
        $firstYear = $years->first();
        $lastYear = $years->last();

        $this->yearRange = '[' . $firstYear . '-' . $lastYear . ']';
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
                    'backgroundColor' => '#F40000',
                    'borderColor' => '#F40000',
                    'pointBackgroundColor' => '#F40000', // Color for inner dots
                    'pointBorderColor' => '#F40000',

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
            'labels' => $assets->map(fn (TrendValue $value) => $value->date),
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
