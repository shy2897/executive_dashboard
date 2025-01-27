<?php

namespace App\Filament\Resources\HRMGraphResource\Pages;

use Filament\Actions\Action;
use Filament\Resources\Pages\Page;
use App\Filament\Resources\HRMGraphResource;
use App\Filament\Resources\FinanceGraphResource;
use App\Filament\Resources\FinanceGraphResource\Widgets\Data\FinanceTable;
use App\Filament\Resources\HRMGraphResource\Widgets\Data\HRMTable;

class HRMData extends Page
{
    protected static string $resource = HRMGraphResource::class;

    protected static string $view = 'filament.resources.h-r-m-graph-resource.pages.h-r-m-data';

    protected function getHeaderWidgets(): array
    {
        return [
            HRMTable::class,
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
