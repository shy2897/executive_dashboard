<?php

namespace App\Filament\Resources\BankingChannelGraphResource\Widgets;

use App\Models\BankingChannel;
use App\Models\Operation;
use Filament\Widgets\ChartWidget;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;

class NgotsabCountAmtChart extends ChartWidget
{
    protected static ?string $heading = 'Ngotshab Transaction Count/Amount';
    protected $yearRange;

    protected function getData(): array
    {
        $count = Trend::query(BankingChannel::where('description', 'Ngotshab Transaction count'))
        ->dateColumn('date')
        ->between(
            start: now()->startOfYear(),
            end: now()->subMonth()->endOfMonth(),
        )
        ->perMonth()
        ->average('data');

        $amount = Trend::query(BankingChannel::where('description', 'Ngotshab Transaction Amount (Thousand)'))
        ->dateColumn('date')
        ->between(
            start: now()->startOfYear(),
            end: now()->subMonth()->endOfMonth(),
        )
        ->perMonth()
        ->average('data');

        $labels = $count->map(function (TrendValue $trendValue) {
            return \Carbon\Carbon::parse($trendValue->date)->format('M'); // Formatting date as "Feb 2024"
        });

        $years = $count->map(function (TrendValue $value) {
            return \Carbon\Carbon::parse($value->date)->year;
        })->unique();

        $latestYear = $years->last();

        // Store the year range in the class property
        $this->yearRange = '[' . $latestYear . ']';
        static::$heading = 'Ngotshab Transaction Count/Amount ' . $this->yearRange;


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
                        'text' => 'Transaction Count/Amount',
                        'font' => [
                            'weight' => 'bold', // Make the title text bold
                        ],
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
