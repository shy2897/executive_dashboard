<?php

namespace App\Filament\Resources\BankingChannelGraphResource\Pages;

use Filament\Actions\Action;
use Filament\Resources\Pages\Page;
use App\Filament\Resources\BankingChannelGraphResource;
use App\Filament\Resources\BankingChannelGraphResource\Widgets\Yearly\YearlyCardATMRupay;
use App\Filament\Resources\BankingChannelGraphResource\Widgets\Yearly\YearlyNgotsabCountAmtChart;
use App\Filament\Resources\BankingChannelGraphResource\Widgets\Yearly\YearlyUserMpayMypay;
use App\Filament\Resources\BankingChannelGraphResource\Widgets\Yearly\YearlyVisaCardINRUSD;

class YearlyBankingChannelGraph extends Page
{
    protected static string $resource = BankingChannelGraphResource::class;

    protected static string $view = 'filament.resources.banking-channel-graph-resource.pages.yearly-banking-channel-graph';

    protected ?string $heading = 'Yearly Banking Channel Data';

    protected function getHeaderWidgets(): array
    {
        return [
            YearlyUserMpayMypay::class,
            YearlyNgotsabCountAmtChart::class,
            YearlyVisaCardINRUSD::class,
            YearlyCardATMRupay::class,
        ];
    }

    protected function getHeaderActions(): array
    {
        return [
            Action::make('Monthly Comparison')
                ->label('Monthly Comparison')
                ->url(BankingChannelGraphResource::getUrl('index'))
                ->color('bnb-blue')
                ->icon('heroicon-o-arrow-left'),
        ];
    }
}
