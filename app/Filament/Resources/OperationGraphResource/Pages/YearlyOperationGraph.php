<?php

namespace App\Filament\Resources\OperationGraphResource\Pages;

use Filament\Actions\Action;
use Filament\Resources\Pages\Page;
use App\Filament\Resources\OperationGraphResource;
use App\Filament\Resources\OperationGraphResource\Widgets\Yearly\YearlyDepositAccountClientChart;
use App\Filament\Resources\OperationGraphResource\Widgets\Yearly\YearlyINRInOutFlowChart;
use App\Filament\Resources\OperationGraphResource\Widgets\Yearly\YearlyUSDInOutFlowChart;

class YearlyOperationGraph extends Page
{
    protected static string $resource = OperationGraphResource::class;

    protected static string $view = 'filament.resources.operation-graph-resource.pages.yearly-operation-graph';

    protected ?string $heading = 'Yearly Operation Data';

    protected function getHeaderWidgets(): array
    {
        return [
            YearlyINRInOutFlowChart::class,
            YearlyUSDInOutFlowChart::class,
            YearlyDepositAccountClientChart::class,
        ];
    }

    protected function getHeaderActions(): array
    {
        return [
            Action::make('Monthly Comparison')
                ->label('Monthly Comparison')
                ->url(OperationGraphResource::getUrl('index'))
                ->color('bnb-blue')
                ->icon('heroicon-o-arrow-left'),
        ];
    }
}
