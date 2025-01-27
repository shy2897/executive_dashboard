<?php

namespace App\Filament\Resources\UserResource\Widgets;

use App\Models\BankingChannel;
use Carbon\Carbon;
use App\Models\Finance;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class DashboardOverview1 extends BaseWidget
{
    protected function getStats(): array
    {
        $latestCustomer = BankingChannel::where('description', 'Total Customers')->max('date');
        $startCustomer = Carbon::parse($latestCustomer)->startOfMonth();
        $endCustomer = Carbon::parse($latestCustomer)->endOfMonth();
        $customers = number_format(BankingChannel::where('description', 'Total Customers')
        ->whereBetween('date', [
            $startCustomer, // Start of the latest month with data
            $endCustomer    // End of the latest month with data
        ])
        ->sum('data')
        );

        $latestDeposit = Finance::where('description', 'Total Deposit (in million)')->max('date');
        $startDeposit = Carbon::parse($latestDeposit)->startOfMonth();
        $endDeposit = Carbon::parse($latestDeposit)->endOfMonth();
        $deposits = number_format(Finance::where('description', 'Total Deposit (in million)')
        ->whereBetween('date', [
            $startDeposit, // Start of the latest month with data
            $endDeposit    // End of the latest month with data
        ])
        ->sum('data')
        );

        $latestAsset = Finance::where('description', 'Total Assets (in million)')->max('date');
        $startAsset = Carbon::parse($latestAsset)->startOfMonth();
        $endAsset = Carbon::parse($latestAsset)->endOfMonth();
        $assets = number_format(Finance::where('description', 'Total Assets (in million)')
        ->whereBetween('date', [
            $startAsset, // Start of the latest month with data
            $endAsset    // End of the latest month with data
        ])
        ->sum('data')
        );

        $latestLoan = Finance::where('description', 'Total Loans (in million)')->max('date');
        $startLoan = Carbon::parse($latestLoan)->startOfMonth();
        $endLoan = Carbon::parse($latestLoan)->endOfMonth();
        $loans = number_format(Finance::where('description', 'Total Loans (in million)')
        ->whereBetween('date', [
            $startLoan, // Start of the latest month with data
            $endLoan    // End of the latest month with data
        ])
        ->sum('data')
        );

        return [
            //Total Customers
            Stat::make('Total Customers', $customers)
            ->descriptionIcon('heroicon-m-arrow-trending-up')
            ->view('stat-image', ['assets' => $customers, 'imagePath' => 'images/customer.gif', 'title' => 'Total Customers']),

            //Total Assets
            Stat::make('Total Assets', $assets."M")
            ->descriptionIcon('heroicon-m-arrow-trending-up')
            ->view('stat-image', ['assets' => $assets . "M", 'imagePath' => 'images/assets.png', 'title' => 'Total Assets']),

            //Total Loans
            Stat::make('Total Loans', $loans."M")
            ->descriptionIcon('heroicon-m-arrow-trending-up')
            ->view('stat-image', ['assets' => $loans . "M", 'imagePath' => 'images/discount-bag.gif', 'title' => 'Total Loans']),

            //Total Deposits
            Stat::make('Total Deposits', $deposits."M")
            ->descriptionIcon('heroicon-m-arrow-trending-up')
            ->view('stat-image', ['assets' => $deposits . "M", 'imagePath' => 'images/save-money.gif', 'title' => 'Total Deposit']),

        ];

    }


}
