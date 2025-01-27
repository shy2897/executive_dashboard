<?php

namespace App\Filament\Resources\BankingChannelGraphResource\Widgets\Filtered;

use Nette\Utils\DateTime;
use Flowframe\Trend\Trend;
use App\Models\BankingChannel;
use Illuminate\Support\Carbon;
use Flowframe\Trend\TrendValue;
use Filament\Widgets\ChartWidget;

class FilteredUserMpayMypay extends ChartWidget
{
    protected static ?string $heading = 'mpay/myPay Users';
    protected $yearRange;
    public int $startYear;
    public int $startMonth;
    public int $endYear;
    public int $endMonth;

    protected function getData(): array
    {
        $startDate = $this->startYear . '-' . str_pad($this->startMonth, 2, '0', STR_PAD_LEFT); // E.g., "2023-01"
        $endDate = $this->endYear . '-' . str_pad($this->endMonth, 2, '0', STR_PAD_LEFT);

        // dd($startDate, $endDate);

        $startStart = Carbon::createFromFormat('Y-m', $startDate)->startOfMonth();
        $endStart = Carbon::createFromFormat('Y-m', $startDate)->endOfMonth();
        $startEnd = Carbon::createFromFormat('Y-m', $endDate)->startOfMonth();
        $endEnd = Carbon::createFromFormat('Y-m', $endDate)->endOfMonth();

        $mpay_start = Trend::query(BankingChannel::where('description', 'No. of mPAY Users'))
        ->dateColumn('date')
        ->between(
            start: $startStart,
            end: $endStart,
        )
        ->perMonth()
        ->average('data');

        $mpay_end = Trend::query(BankingChannel::where('description', 'No. of mPAY Users'))
        ->dateColumn('date')
        ->between(
            start: $startEnd,
            end: $endEnd,
        )
        ->perMonth()
        ->average('data');

        $mypay_start = Trend::query(BankingChannel::where('description', 'No. of MyPay Users'))
        ->dateColumn('date')
        ->between(
            start: $startStart,
            end: $endStart,
        )
        ->perMonth()
        ->average('data');

        $mypay_end = Trend::query(BankingChannel::where('description', 'No. of MyPay Users'))
        ->dateColumn('date')
        ->between(
            start: $startEnd,
            end: $endEnd,
        )
        ->perMonth()
        ->average('data');

        $startDateFormat = DateTime::createFromFormat('Y-m', $startDate)->format('Y-M');
        $endDateFormat = DateTime::createFromFormat('Y-m', $endDate)->format('Y-M');


        $this->yearRange = '[' . $startDateFormat . ' & ' . $endDateFormat . ']';
        static::$heading = 'mpay/myPay Users ' . $this->yearRange;

        return [
            'datasets' => [
                [
                    'label' => 'mPay Users',
                    'data' => $mpay_start->map(fn (TrendValue $value) => $value->aggregate)
                            ->merge($mpay_end->map(fn (TrendValue $value) => $value->aggregate)),
                    'backgroundColor' => '#268FE9',
                    'borderColor' => '#268FE9',
                    'pointBackgroundColor' => '#268FE9', // Color for inner dots
                    'pointBorderColor' => '#268FE9',

                ],
                [
                    'label' => 'myPay Users',
                    'data' => $mypay_start->map(fn (TrendValue $value) => $value->aggregate)
                    ->merge($mypay_end->map(fn (TrendValue $value) => $value->aggregate)),
                    'backgroundColor' => '#f40000',
                    'borderColor' => '#f40000',
                    'pointBackgroundColor' => '#f40000', // Color for inner dots
                    'pointBorderColor' => '#f40000',


                ]
            ],
            'labels' => $mpay_start->map(fn (TrendValue $value) => Carbon::parse($value->date)->format('Y-M'))
                        ->merge($mpay_end->map(fn (TrendValue $value) => Carbon::parse($value->date)->format('Y-M'))),
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
