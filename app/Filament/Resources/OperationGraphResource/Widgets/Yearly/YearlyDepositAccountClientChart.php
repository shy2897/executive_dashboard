<?php

namespace App\Filament\Resources\OperationGraphResource\Widgets\Yearly;

use App\Models\Finance;
use App\Models\Operation;
use Flowframe\Trend\Trend;
use Illuminate\Support\Carbon;
use Flowframe\Trend\TrendValue;
use Filament\Widgets\ChartWidget;

class YearlyDepositAccountClientChart extends ChartWidget
{
    protected static ?string $heading = 'Deposit Account & CLient ';
    protected $yearRange;

    protected function getData(): array
    {
        $earliestDate = Operation::where('description', 'No. of Deposit Accounts')
            ->orderBy('date', 'asc')
            ->first()
            ->date;

        // Determine the start and end dates for the query
        $startOfYear = Carbon::parse($earliestDate)->startOfYear(); // Start of the earliest year
        $endDate = Carbon::now()->subMonth()->endOfMonth(); // Previous month end date

        $account = Trend::query(Operation::where('description', 'No. of Deposit Accounts'))
        ->dateColumn('date')
        ->between(
            start: $startOfYear,
            end: $endDate,
        )
        ->perYear()
        ->average('data');


        $clients = Trend::query(Operation::where('description', 'No. of Deposit Clients'))
        ->dateColumn('date')
        ->between(
            start: $startOfYear,
            end: $endDate,
        )
        ->perYear()
        ->average('data');

        $years = $account->map(fn (TrendValue $value) => $value->date);
        $firstYear = $years->first();
        $lastYear = $years->last();

        $this->yearRange = '[' . $firstYear . '-' . $lastYear . ']';
        static::$heading = 'Deposit Accounts & Clients ' . $this->yearRange;


        return [
            'datasets' => [

                [
                    'label' => 'Deposit Accounts',
                    'data' => $account->map(fn (TrendValue $value) => $value->aggregate),
                    'backgroundColor' => '#268FE9',
                    'borderColor' => '#268FE9',
                    'pointBackgroundColor' => '#268FE9', // Color for inner dots
                    'pointBorderColor' => '#268FE9',
                ],
                [
                    'label' => 'Deposit Clients',
                    'data' => $clients->map(fn (TrendValue $value) => $value->aggregate),
                    'backgroundColor' => '#F40000',
                    'borderColor' => '#F40000',
                    'pointBackgroundColor' => '#F40000', // Color for inner dots
                    'pointBorderColor' => '#F40000',
                ],

            ],
           'labels' => $account->map(fn (TrendValue $value) => $value->date),
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
                    'position' => 'left',
                    'title' => [
                        'display' => true,
                        'text' => 'Deposit Acccounts/Clients',
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
