<?php

namespace App\Filament\Resources\BankingChannelGraphResource\Widgets;

use Flowframe\Trend\Trend;
use App\Models\BankingChannel;
use Flowframe\Trend\TrendValue;
use Filament\Widgets\ChartWidget;

class UserMpayMypay extends ChartWidget
{
    protected static ?string $heading = 'mpay/myPay Users';
    protected $yearRange;

    protected function getData(): array
    {
        $mpay = Trend::query(BankingChannel::where('description', 'No. of mPAY Users'))
        ->dateColumn('date')
        ->between(
            start: now()->startOfYear(),
            end: now()->subMonth()->endOfMonth(),
        )
        ->perMonth()
        ->average('data');

        $mypay = Trend::query(BankingChannel::where('description', 'No. of MyPay Users'))
        ->dateColumn('date')
        ->between(
            start: now()->startOfYear(),
            end: now()->subMonth()->endOfMonth(),
        )
        ->perMonth()
        ->average('data');

        $labels = $mpay->map(function (TrendValue $trendValue) {
            return \Carbon\Carbon::parse($trendValue->date)->format('M'); // Formatting date as "Feb 2024"
        });

        $years = $mpay->map(function (TrendValue $value) {
            return \Carbon\Carbon::parse($value->date)->year;
        })->unique();

        $earliestYear = $years->first();
        $latestYear = $years->last();

        // Store the year range in the class property
        $this->yearRange = '[' . $earliestYear . ' - ' . $latestYear . ']';
        static::$heading = 'mpay/myPay Users ' . $this->yearRange;

        return [
            'datasets' => [
                [
                    'label' => 'mPay Users',
                    'data' => $mpay->map(fn (TrendValue $value) => $value->aggregate),
                    'backgroundColor' => '#268FE9',
                    'borderColor' => '#268FE9',
                    'pointBackgroundColor' => '#268FE9', // Color for inner dots
                    'pointBorderColor' => '#268FE9',

                ],
                [
                    'label' => 'myPay Users',
                    'data' => $mypay->map(fn (TrendValue $value) => $value->aggregate),
                    'backgroundColor' => '#f40000',
                    'borderColor' => '#f40000',
                    'pointBackgroundColor' => '#f40000', // Color for inner dots
                    'pointBorderColor' => '#f40000',


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
                ],
                'y' => [
                    'type' => 'linear',
                    'position' => 'left',
                    'title' => [
                        'display' => true,
                        'text' => 'No of Users',
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
        return 'bar';
    }

}
