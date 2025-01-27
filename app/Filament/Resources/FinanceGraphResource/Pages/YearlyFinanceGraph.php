<?php

namespace App\Filament\Resources\FinanceGraphResource\Pages;

use Filament\Actions\Action;
use Filament\Resources\Pages\Page;
use App\Filament\Resources\FinanceGraphResource;
use App\Filament\Resources\HRMGraphResource\Pages\YearlyHRMGraph;
use App\Filament\Resources\FinanceGraphResource\Widgets\Yearly\YearlyGrossNPLChart;
use App\Filament\Resources\FinanceGraphResource\Widgets\Yearly\YearlyLoanDepositProductsChart;
use App\Filament\Resources\FinanceGraphResource\Widgets\Yearly\YearlyLoanProductAccountClientChart;
use App\Filament\Resources\FinanceGraphResource\Widgets\Yearly\YearlyLoanProvisionChart;
use App\Filament\Resources\FinanceGraphResource\Widgets\Yearly\YearlyTotalAssetsLoansDepositsChart;

class YearlyFinanceGraph extends Page
{
    protected static string $resource = FinanceGraphResource::class;

    protected static string $view = 'filament.resources.finance-graph-resource.pages.yearly-finance-graph';

    protected ?string $heading = 'Yearly Finance Data';

    protected function getHeaderWidgets(): array
    {
        return [
            YearlyTotalAssetsLoansDepositsChart::class,
            YearlyGrossNPLChart::class,
            YearlyLoanDepositProductsChart::class,
            YearlyLoanProductAccountClientChart::class,
            YearlyLoanProvisionChart::class,
        ];
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
