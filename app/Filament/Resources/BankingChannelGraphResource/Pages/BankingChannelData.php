<?php

namespace App\Filament\Resources\BankingChannelGraphResource\Pages;

use Filament\Actions\Action;
use Filament\Resources\Pages\Page;
use App\Filament\Resources\FinanceGraphResource;
use App\Filament\Resources\BankingChannelGraphResource;
use App\Filament\Resources\BankingChannelGraphResource\Widgets\Data\BankingChannelTable;

class BankingChannelData extends Page
{
    protected static string $resource = BankingChannelGraphResource::class;

    protected static string $view = 'filament.resources.banking-channel-graph-resource.pages.banking-channel-data';

    protected function getHeaderWidgets(): array
    {
        return [
            BankingChannelTable::class,
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
