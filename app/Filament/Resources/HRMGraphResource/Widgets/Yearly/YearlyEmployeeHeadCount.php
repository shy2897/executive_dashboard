<?php

namespace App\Filament\Resources\HRMGraphResource\Widgets\Yearly;

use App\Models\HRM;
use Flowframe\Trend\Trend;
use Illuminate\Support\Carbon;
use Flowframe\Trend\TrendValue;
use Filament\Widgets\ChartWidget;

class YearlyEmployeeHeadCount extends ChartWidget
{
    protected static ?string $heading = 'Head Count ';
    protected $yearRange;

    protected function getData(): array
    {
        $earliestDate = HRM::where('description', 'No. of employees recruited during the month')
            ->orderBy('date', 'asc')
            ->first()
            ->date;

        // Determine the start and end dates for the query
        $startOfYear = Carbon::parse($earliestDate)->startOfYear(); // Start of the earliest year
        $endDate = Carbon::now()->subMonth()->endOfMonth(); // Previous month end date

        $recruited = Trend::query(HRM::where('description', 'No. of employees recruited during the month'))
        ->dateColumn('date')
        ->between(
            start: $startOfYear,
            end: $endDate,
        )
        ->perYear()
        ->average('data');


        $separated = Trend::query(HRM::where('description', 'No. of employees separated during the month'))
        ->dateColumn('date')
        ->between(
            start: $startOfYear,
            end: $endDate,
        )
        ->perYear()
        ->average('data');

        $years = $recruited->map(fn (TrendValue $value) => $value->date);
        $firstYear = $years->first();
        $lastYear = $years->last();

        $this->yearRange = '[' . $firstYear . '-' . $lastYear . ']';
        static::$heading = 'Head Count ' . $this->yearRange;


        return [
            'datasets' => [

                [
                    'label' => 'Employees Recruited',
                    'data' => $recruited->map(fn (TrendValue $value) => $value->aggregate),
                    'backgroundColor' => '#268FE9',
                    'borderColor' => '#268FE9',
                    'pointBackgroundColor' => '#268FE9', // Color for inner dots
                    'pointBorderColor' => '#268FE9',
                ],
                [
                    'label' => 'Employees Separated',
                    'data' => $separated->map(fn (TrendValue $value) => $value->aggregate),
                    'backgroundColor' => '#F40000',
                    'borderColor' => '#F40000',
                    'pointBackgroundColor' => '#F40000', // Color for inner dots
                    'pointBorderColor' => '#F40000',
                ],

            ],
           'labels' => $recruited->map(fn (TrendValue $value) => $value->date),
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
                        'text' => 'No of Employees',
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

