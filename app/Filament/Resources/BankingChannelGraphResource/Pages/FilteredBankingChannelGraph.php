<?php

namespace App\Filament\Resources\BankingChannelGraphResource\Pages;

use Filament\Actions\Action;
use Filament\Resources\Pages\Page;
use App\Filament\Resources\BankingChannelGraphResource;
use App\Filament\Resources\BankingChannelGraphResource\Widgets\Filtered\FilteredCardATMRupay;
use App\Filament\Resources\BankingChannelGraphResource\Widgets\Filtered\FilteredNgotsabCountAmtChart;
use App\Filament\Resources\BankingChannelGraphResource\Widgets\Filtered\FilteredUserMpayMypay;
use App\Filament\Resources\BankingChannelGraphResource\Widgets\Filtered\FilteredVisaCardINRUSD;

class FilteredBankingChannelGraph extends Page
{
    protected static string $resource = BankingChannelGraphResource::class;

    protected static string $view = 'filament.resources.banking-channel-graph-resource.pages.filtered-banking-channel-graph';

    protected ?string $heading = 'Filtered Banking Channel Data';

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
        if ($selectedData === 'mpay/myPay Users') {
            $widgets[] = FilteredUserMpayMypay::make([
                'startYear' => $startYear,
                'startMonth' => $startMonth,
                'endYear' => $endYear,
                'endMonth' => $endMonth,
            ]);
        } elseif ($selectedData === 'Ngotshab Transaction Count/Amount') {
            $widgets[] = FilteredNgotsabCountAmtChart::make([
                'startYear' => $startYear,
                'startMonth' => $startMonth,
                'endYear' => $endYear,
                'endMonth' => $endMonth,
            ]);
        } elseif ($selectedData === 'Visa Card INR/USD') {
            $widgets[] = FilteredVisaCardINRUSD::make([
                'startYear' => $startYear,
                'startMonth' => $startMonth,
                'endYear' => $endYear,
                'endMonth' => $endMonth,
            ]);
        } elseif ($selectedData === 'ATM/Rupay Card') {
            $widgets[] = FilteredCardATMRupay::make([
                'startYear' => $startYear,
                'startMonth' => $startMonth,
                'endYear' => $endYear,
                'endMonth' => $endMonth,
            ]);
        } else {
            // If 'selectedData' is empty, show all widgets
            $widgets = [
                FilteredUserMpayMypay::make([
                    'startYear' => $startYear,
                    'startMonth' => $startMonth,
                    'endYear' => $endYear,
                    'endMonth' => $endMonth,
                ]),
                FilteredNgotsabCountAmtChart::make([
                    'startYear' => $startYear,
                    'startMonth' => $startMonth,
                    'endYear' => $endYear,
                    'endMonth' => $endMonth,
                ]),
                FilteredVisaCardINRUSD::make([
                    'startYear' => $startYear,
                    'startMonth' => $startMonth,
                    'endYear' => $endYear,
                    'endMonth' => $endMonth,
                ]),
                FilteredCardATMRupay::make([
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
                ->url(BankingChannelGraphResource::getUrl('index'))
                ->color('bnb-blue')
                ->icon('heroicon-o-arrow-left'),
        ];
    }
}
