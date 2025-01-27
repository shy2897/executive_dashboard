<?php

namespace App\Filament\Resources\FinanceGraphResource\Widgets\Filtered;

use App\Models\Finance;
use Nette\Utils\DateTime;
use Flowframe\Trend\Trend;
use Illuminate\Support\Carbon;
use Flowframe\Trend\TrendValue;
use Filament\Widgets\ChartWidget;

class FilteredTotalAssetsLoansDepositsChart extends ChartWidget
{
    protected static ?string $heading = 'Total Assets, Loans & Deposits';
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

        $asset_start = Trend::query(Finance::where('description', 'Total Assets (in million)'))
        ->dateColumn('date')
        ->between(
            start: $startStart,
            end: $endStart,
        )
        ->perMonth()
        ->average('data');

        $asset_end = Trend::query(Finance::where('description', 'Total Assets (in million)'))
        ->dateColumn('date')
        ->between(
            start: $startEnd,
            end: $endEnd,
        )
        ->perMonth()
        ->average('data');

        $loan_start = Trend::query(Finance::where('description', 'Total Loans (in million)'))
        ->dateColumn('date')
        ->between(
            start: $startStart,
            end: $endStart,
        )
        ->perMonth()
        ->average('data');

        $loan_end = Trend::query(Finance::where('description', 'Total Loans (in million)'))
        ->dateColumn('date')
        ->between(
            start: $startEnd,
            end: $endEnd,
        )
        ->perMonth()
        ->average('data');

        $deposit_start = Trend::query(Finance::where('description', 'Total Deposit (in million)'))
        ->dateColumn('date')
        ->between(
            start: $startStart,
            end: $endStart,
        )
        ->perMonth()
        ->average('data');

        $deposit_end = Trend::query(Finance::where('description', 'Total Deposit (in million)'))
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
        static::$heading = 'Total Assets, Loans & Deposits ' . $this->yearRange;

        return [
            'datasets' => [

                [
                    'label' => 'Total Assets (million)',
                    'data' => $asset_start->map(fn (TrendValue $value) => $value->aggregate)
                                ->merge($asset_end->map(fn (TrendValue $value) => $value->aggregate)),
                    'backgroundColor' => '#268FE9',
                    'borderColor' => '#268FE9',
                    'pointBackgroundColor' => '#268FE9', // Color for inner dots
                    'pointBorderColor' => '#268FE9',

                ],
                [
                    'label' => 'Total Loans (million)',
                    'data' => $loan_start->map(fn (TrendValue $value) => $value->aggregate)
                                ->merge($loan_end->map(fn (TrendValue $value) => $value->aggregate)),
                    'backgroundColor' => '#F40000',
                    'borderColor' => '#F40000',
                    'pointBackgroundColor' => '#F40000', // Color for inner dots
                    'pointBorderColor' => '#F40000',

                ],
                [
                    'label' => 'Total Deposits (million)',
                    'data' => $deposit_start->map(fn (TrendValue $value) => $value->aggregate)
                                ->merge($deposit_end->map(fn (TrendValue $value) => $value->aggregate)),
                    'backgroundColor' => '#252d60',
                    'borderColor' => '#252d60',
                    'pointBackgroundColor' => '#252d60', // Color for inner dots
                    'pointBorderColor' => '#252d60',

                ],
            ],
            'labels' => $asset_start->map(fn (TrendValue $value) => Carbon::parse($value->date)->format('Y-M'))
                        ->merge($asset_end->map(fn (TrendValue $value) => Carbon::parse($value->date)->format('Y-M'))),
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
