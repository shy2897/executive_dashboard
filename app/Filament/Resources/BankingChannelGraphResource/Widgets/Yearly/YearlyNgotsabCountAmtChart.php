<?php

namespace App\Filament\Resources\BankingChannelGraphResource\Widgets\Yearly;

use App\Models\Operation;
use Flowframe\Trend\Trend;
use App\Models\BankingChannel;
use Illuminate\Support\Carbon;
use Flowframe\Trend\TrendValue;
use Filament\Widgets\ChartWidget;

class YearlyNgotsabCountAmtChart extends ChartWidget
{
    protected static ?string $heading = 'Ngotsab Transaction Count/Amount';
    protected $yearRange;

    protected function getData(): array
    {
        $earliestDate = BankingChannel::where('description', 'Ngotshab Transaction count')
            ->orderBy('date', 'asc')
            ->first()
            ->date;

        // Determine the start and end dates for the query
        $startOfYear = Carbon::parse($earliestDate)->startOfYear(); // Start of the earliest year
        $endDate = Carbon::now()->subMonth()->endOfMonth(); // Previous month end date
        $count = Trend::query(BankingChannel::where('description', 'Ngotshab Transaction count'))
        ->dateColumn('date')
        ->between(
            start: $startOfYear,
            end: $endDate,
        )
        ->perYear()
        ->average('data');

        $amount = Trend::query(BankingChannel::where('description', 'Ngotshab Transaction Amount (Thousand)'))
        ->dateColumn('date')
        ->between(
            start: $startOfYear,
            end: $endDate,
        )
        ->perYear()
        ->average('data');

        $years = $count->map(function (TrendValue $value) {
            return \Carbon\Carbon::parse($value->date)->year;
        })->unique();

        $years = $count->map(fn (TrendValue $value) => $value->date);
        $firstYear = $years->first();
        $lastYear = $years->last();

        $this->yearRange = '[' . $firstYear . '-' . $lastYear . ']';
        static::$heading = 'Ngotsab Transaction Count/Amount ' . $this->yearRange;


        return [
            'datasets' => [
                [
                    'label' => 'Transaction Count',
                    'data' => $count->map(fn (TrendValue $value) => $value->aggregate),
                    'backgroundColor' => '#268FE9',
                    'borderColor' => '#268FE9',
                    'pointBackgroundColor' => '#268FE9', // Color for inner dots
                    'pointBorderColor' => '#268FE9',
                ],
                [
                    'label' => 'Transaction Amount',
                    'data' => $amount->map(fn (TrendValue $value) => $value->aggregate),
                    'backgroundColor' => '#f40000',
                    'borderColor' => '#f40000',
                    'pointBackgroundColor' => '#f40000', // Color for inner dots
                    'pointBorderColor' => '#f40000',
                ],

            ],

            'labels' => $count->map(fn (TrendValue $value) => $value->date),
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
                        'text' => 'Transaction Count/Amount',
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

