<?php

namespace App\Filament\Resources\OperationGraphResource\Pages;

use Filament\Actions\Action;
use Filament\Resources\Pages\Page;
use App\Filament\Resources\FinanceGraphResource;
use App\Filament\Resources\OperationGraphResource;
use App\Filament\Resources\HRMGraphResource\Widgets\Data\HRMTable;
use App\Filament\Resources\OperationGraphResource\Widgets\Data\OperationTable;



class OperationData extends Page
{
    protected static string $resource = OperationGraphResource::class;

    protected static string $view = 'filament.resources.operation-graph-resource.pages.operation-data';

    protected function getHeaderWidgets(): array
    {
        return [
            OperationTable::class,
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
