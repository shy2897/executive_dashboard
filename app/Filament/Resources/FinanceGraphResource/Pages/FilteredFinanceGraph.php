<?php

namespace App\Filament\Resources\FinanceGraphResource\Pages;

use Filament\Actions\Action;
use Illuminate\Http\Request;
use Filament\Resources\Pages\Page;
use App\Filament\Resources\FinanceGraphResource;
use App\Filament\Resources\FinanceGraphResource\Widgets\Filtered\FilteredGrossNPLChart;
use App\Filament\Resources\FinanceGraphResource\Widgets\Filtered\FilteredLoanDepositProductsChart;
use App\Filament\Resources\FinanceGraphResource\Widgets\Filtered\FilteredLoanProductAccountClientChart;
use App\Filament\Resources\FinanceGraphResource\Widgets\Filtered\FilteredLoanProvisionChart;
use App\Filament\Resources\FinanceGraphResource\Widgets\Filtered\FilteredTotalAssetsLoansDepositsChart;

class FilteredFinanceGraph extends Page
{
    protected static string $resource = FinanceGraphResource::class;

    protected static string $view = 'filament.resources.finance-graph-resource.pages.filtered-finance-graph';

    protected ?string $heading = 'Filtered Finance Data';

    protected function getHeaderWidgets(): array
    {
        // Access query parameters
        $startYear = request()->query('startYear');
        $startMonth = request()->query('startMonth');
        $endYear = request()->query('endYear');
        $endMonth = request()->query('endMonth');
        $selectedData = request()->query('selectedData'); // Selected data parameter

        // Initialize the widget array
        $widgets = [];

        // Conditional logic based on the 'selectedData' parameter
        if ($selectedData === 'Total Assets, Loans & Deposits') {
            $widgets[] = FilteredTotalAssetsLoansDepositsChart::make([
                'startYear' => $startYear,
                'startMonth' => $startMonth,
                'endYear' => $endYear,
                'endMonth' => $endMonth,
            ]);
        } elseif ($selectedData === 'Gross NPL') {
            $widgets[] = FilteredGrossNPLChart::make([
                'startYear' => $startYear,
                'startMonth' => $startMonth,
                'endYear' => $endYear,
                'endMonth' => $endMonth,
            ]);
        } elseif ($selectedData === 'No of Loan & Deposit Products') {
            $widgets[] = FilteredLoanDepositProductsChart::make([
                'startYear' => $startYear,
                'startMonth' => $startMonth,
                'endYear' => $endYear,
                'endMonth' => $endMonth,
            ]);
        } elseif ($selectedData === 'Loan Accounts & Clients') {
            $widgets[] = FilteredLoanProductAccountClientChart::make([
                'startYear' => $startYear,
                'startMonth' => $startMonth,
                'endYear' => $endYear,
                'endMonth' => $endMonth,
            ]);
        } elseif ($selectedData === 'Loan Provisions') {
            $widgets[] = FilteredLoanProvisionChart::make([
                'startYear' => $startYear,
                'startMonth' => $startMonth,
                'endYear' => $endYear,
                'endMonth' => $endMonth,
            ]);
        } else {
            // If 'selectedData' is empty, show all widgets
            $widgets = [
                FilteredTotalAssetsLoansDepositsChart::make([
                    'startYear' => $startYear,
                    'startMonth' => $startMonth,
                    'endYear' => $endYear,
                    'endMonth' => $endMonth,
                ]),
                FilteredGrossNPLChart::make([
                    'startYear' => $startYear,
                    'startMonth' => $startMonth,
                    'endYear' => $endYear,
                    'endMonth' => $endMonth,
                ]),
                FilteredLoanDepositProductsChart::make([
                    'startYear' => $startYear,
                    'startMonth' => $startMonth,
                    'endYear' => $endYear,
                    'endMonth' => $endMonth,
                ]),
                FilteredLoanProductAccountClientChart::make([
                    'startYear' => $startYear,
                    'startMonth' => $startMonth,
                    'endYear' => $endYear,
                    'endMonth' => $endMonth,
                ]),
                FilteredLoanProvisionChart::make([
                    'startYear' => $startYear,
                    'startMonth' => $startMonth,
                    'endYear' => $endYear,
                    'endMonth' => $endMonth,
                ]),
            ];
        }

        return $widgets;
    }


    protected function getHeaderActions(): array
    {
        return [
            Action::make('Monthly Comparison')
                ->label('Monthly Comparison')
                ->url(FinanceGraphResource::getUrl('index'))
                ->color('bnb-blue')
                ->icon('heroicon-o-arrow-left'),
        ];
    }

}
