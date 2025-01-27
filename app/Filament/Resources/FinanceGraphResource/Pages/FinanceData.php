<?php

namespace App\Filament\Resources\FinanceGraphResource\Pages;

use App\Models\Finance;
use Filament\Tables\Table;
use Filament\Actions\Action;
use Filament\Resources\Pages\Page;
use Filament\Tables\Columns\TextColumn;
use App\Filament\Resources\FinanceGraphResource;
use App\Filament\Resources\FinanceGraphResource\Widgets\Data\FinanceTable;

class FinanceData extends Page
{
    protected static string $resource = FinanceGraphResource::class;

    protected static string $view = 'filament.resources.finance-graph-resource.pages.finance-data';

    protected function getHeaderWidgets(): array
    {
        return [
            FinanceTable::class,
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
