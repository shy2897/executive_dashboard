<?php

namespace App\Filament\Resources\FinanceGraphResource\Pages;

use App\Models\Finance;
use Flowframe\Trend\Trend;
use Illuminate\Support\Carbon;
use Flowframe\Trend\TrendValue;
use Filament\Pages\Actions\Action;
use Filament\Resources\Pages\Page;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Select;
use Filament\Notifications\Notification;
use Filament\Forms\Components\ToggleButtons;
use App\Filament\Resources\FinanceGraphResource;;
use App\Filament\Resources\FinanceGraphResource\Widgets\GrossNPLChart;
use App\Filament\Resources\FinanceGraphResource\Widgets\LoanProvisionChart;
use App\Filament\Resources\FinanceGraphResource\Widgets\LoanDepositProductsChart;
use App\Filament\Resources\FinanceGraphResource\Widgets\LoanProductAccountClientChart;
use App\Filament\Resources\FinanceGraphResource\Widgets\TotalAssetsLoansDepositsChart;

class FinanceGraphs extends Page
{
    protected static string $resource = FinanceGraphResource::class;

    protected static string $view = 'filament.resources.finance-graph-resource.pages.finance-graphs';

    protected ?string $heading = 'Finance';


    protected function getHeaderWidgets(): array
    {
        return [
            TotalAssetsLoansDepositsChart::class,
            GrossNPLChart::class,
            LoanDepositProductsChart::class,
            LoanProductAccountClientChart::class,
            LoanProvisionChart::class,
        ];
    }

    protected function getHeaderActions(): array
    {
        $earliestDate = Finance::where('description', 'No. of Loan Accounts')
            ->orderBy('date', 'asc')
            ->first()
            ->date;

        // Determine the start and end dates for the query
        $startOfYear = Carbon::parse($earliestDate)->startOfYear(); // Start of the earliest year
        $endDate = Carbon::now()->subMonth()->endOfMonth(); // Previous month end date
        $percentage = Trend::query(Finance::where('description', 'Gross NPL (%)'))
        ->dateColumn('date')
        ->between(
            start: $startOfYear,
            end: $endDate,
        )
        ->perYear()
        ->average('data');

        $yearOptions = [];
        $percentage->map(fn (TrendValue $value) => $value->date)
            ->unique()
            ->each(function ($year) use (&$yearOptions) {
                $yearOptions[$year] = $year; // Use year as both key and value
            });


        return [
            Action::make('View more details')
                ->label('View more details')
                ->url(FinanceGraphResource::getUrl('finance-view-detail-data'))
                ->color('bnb-blue')
                ->icon('heroicon-o-eye'),

            Action::make('Yearly Comparison')
                ->label('Yearly Comparison')
                ->url(FinanceGraphResource::getUrl('yearly-finance-graph'))
                ->color('bnb-blue')
                ->icon('heroicon-o-calendar-days'),

             Action::make('filter')
                ->label('Filter by Range')
                ->form([
                     // Start Year and Start Month Row
                     Grid::make(3)->schema([
                        Select::make('SelectSpecificData')
                        ->options([
                            'Total Assets, Loans & Deposits' => 'Total Assets, Loans & Deposits',
                            'Gross NPL' => 'Gross NPL',
                            'No of Loan & Deposit Products' => 'No of Loan & Deposit Products ',
                            'Loan Accounts & Clients' => 'Loan Accounts & Clients',
                            'Loan Provisions' => 'Loan Provisions',
                        ])
                        ->columnSpan(1)
                     ]),
                    // Start Year and Start Month Row
                    Grid::make(3)->schema([
                        ToggleButtons::make('startYear')
                            ->label('Start Year')
                            ->options($yearOptions) // Populate toggle button options with the array of years
                            ->required()
                            ->inline()
                            ->extraAttributes(['class' => 'centered-toggle-buttons'])
                            ->columnSpan([
                                'default' => 4, // Full width for mobile screens
                                'sm' => 1,      // Single column for smaller screens
                                'lg' => 1,      // Original 1/3 column span for larger screens
                            ]),

                            ToggleButtons::make('startMonth')
                                ->label('Start Month')
                                ->options([
                                    '01' => 'Jan',
                                    '02' => 'Feb',
                                    '03' => 'Mar',
                                    '04' => 'Apr',
                                    '05' => 'May',
                                    '06' => 'Jun',
                                    '07' => 'Jul',
                                    '08' => 'Aug',
                                    '09' => 'Sep',
                                    '10' => 'Oct',
                                    '11' => 'Nov',
                                    '12' => 'Dec',
                                ])
                                ->required()
                                ->columns([
                                    'default' => 6, // Full width for mobile screens
                                    'lg' => 6,      // Original 1/3 column span for larger screens)
                                ])
                                ->gridDirection('row')
                                ->columnSpan(2),
                    ])
                    ->columnSpan('full'),

                    // End Year and End Month Row
                    Grid::make(3)->schema([
                        ToggleButtons::make('endYear')
                            ->label('End Year')
                            ->options($yearOptions) // Populate toggle button options with the array of years
                            ->required()
                            ->inline()
                            ->columnSpan(1),

                            ToggleButtons::make('endMonth')
                            ->label('End Month')
                            ->options([
                                '01' => 'Jan',
                                '02' => 'Feb',
                                '03' => 'Mar',
                                '04' => 'Apr',
                                '05' => 'May',
                                '06' => 'Jun',
                                '07' => 'Jul',
                                '08' => 'Aug',
                                '09' => 'Sep',
                                '10' => 'Oct',
                                '11' => 'Nov',
                                '12' => 'Dec',
                            ])
                            ->required()
                            ->columns([
                                'default' => 6, // Full width for mobile screens
                                'lg' => 6,      // Original 1/3 column span for larger screens)
                            ])
                            ->gridDirection('row')
                            ->columnSpan(2)
                    ]),
                ])

                ->action(function (array $data) {
                    // Retrieve the values for startYear, startMonth, endYear, and endMonth
                    $startYear = $data['startYear'];
                    $startMonth = $data['startMonth'];
                    $endYear = $data['endYear'];
                    $endMonth = $data['endMonth'];
                    $selectedData = $data['SelectSpecificData'];

                    // Custom validation: Check if start year is greater than end year
                    if ($startYear > $endYear) {
                        Notification::make()
                        ->title('Validation Error')
                        ->danger()
                        ->body('The start year cannot be greater than the end year.')
                        ->send()
                        ->icon('heroicon-o-exclamation-circle')
                        ->color('red');  // Sets the background to red

                        return;
                    }

                    if ($startYear == $endYear && $startMonth >= $endMonth) {
                        Notification::make()
                            ->title('Validation Error')
                            ->danger()
                            ->body('When the Start Year and End Year is same, Start Month must be less than the End Month.')
                            ->icon('heroicon-o-exclamation-circle')
                            ->send();

                        return;
                    }


                    // Redirect to a page with the filtered year and month range
                    $url = FinanceGraphResource::getUrl('filtered-finance-graph', [
                        'startYear' => $startYear,
                        'startMonth' => $startMonth,
                        'endYear' => $endYear,
                        'endMonth' => $endMonth,
                        'selectedData' => $selectedData,
                    ]);

                    return redirect($url);
                })
                ->color('bnb-blue')
                ->icon('heroicon-o-funnel'),

        ];
    }


}

