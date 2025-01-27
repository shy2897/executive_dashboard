<?php

namespace App\Filament\Resources\FinanceGraphResource\Widgets\Filtered;

use App\Models\Finance;
use App\Models\Operation;
use Nette\Utils\DateTime;
use Flowframe\Trend\Trend;
use Illuminate\Support\Carbon;
use Flowframe\Trend\TrendValue;
use Filament\Widgets\ChartWidget;

class FilteredLoanDepositProductsChart extends ChartWidget
{
    protected static ?string $heading = 'No of Loan & Deposit Products';
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

        $loan_start = Trend::query(Finance::where('description', 'No. of Loan Products'))
        ->dateColumn('date')
        ->between(
            start: $startStart,
            end: $endStart,
        )
        ->perMonth()
        ->average('data');

        $loan_end = Trend::query(Finance::where('description', 'No. of Loan Products'))
        ->dateColumn('date')
        ->between(
            start: $startEnd,
            end: $endEnd,
        )
        ->perMonth()
        ->average('data');

        $deposit_start = Trend::query(Operation::where('description', 'No. of Deposit Products'))
        ->dateColumn('date')
        ->between(
            start: $startStart,
            end: $endStart,
        )
        ->perMonth()
        ->average('data');

        $deposit_end = Trend::query(Operation::where('description', 'No. of Deposit Products'))
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
        static::$heading = 'No of Loan & Deposit Products ' . $this->yearRange;

        return [
            'datasets' => [
                [
                    'label' => 'Loan Products',
                    'data' => $loan_start->map(fn (TrendValue $value) => $value->aggregate)
                                ->merge($loan_end->map(fn (TrendValue $value) => $value->aggregate)),
                    'backgroundColor' => '#268FE9',
                    'borderColor' => '#268FE9',
                    'pointBackgroundColor' => '#268FE9', // Color for inner dots
                    'pointBorderColor' => '#268FE9',

                ],
                [
                    'label' => 'Deposit Products',
                    'data' => $deposit_start->map(fn (TrendValue $value) => $value->aggregate)
                                ->merge($deposit_end->map(fn (TrendValue $value) => $value->aggregate)),
                    'backgroundColor' => '#f40000',
                    'borderColor' => '#f40000',
                    'pointBackgroundColor' => '#f40000', // Color for inner dots
                    'pointBorderColor' => '#f40000',


                ]
            ],
            'labels' => $loan_start->map(fn (TrendValue $value) => Carbon::parse($value->date)->format('Y-M'))
                             ->merge($loan_end->map(fn (TrendValue $value) => Carbon::parse($value->date)->format('Y-M'))),
        ];
    }

    protected function getOptions(): array
    {
        return [
            'scales' => [
                'x' => [
                    'title' => [
                        'display' => true,
                        'text' => $this->yearRange,
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
                        'text' => 'No of Loan/Deposit Products',
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
