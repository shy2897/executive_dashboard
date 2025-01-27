<?php

namespace App\Filament\Resources\UserResource\Widgets;

use App\Models\Mpay;
use App\Models\Finance;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class DashboardOverview extends BaseWidget
{
    protected function getStats(): array
    {

        $assets = Finance::where('description', 'Total Assets (in million)')
        ->whereBetween('date', [
            now()->subMonth()->startOfMonth(), // Start of the previous month
            now()->subMonth()->endOfMonth()    // End of the previous month
        ])
        ->sum('data');

        $deposits = Finance::where('description', 'Total Deposit (in million)')
        ->whereBetween('date', [
            now()->subMonth()->startOfMonth(), // Start of the previous month
            now()->subMonth()->endOfMonth()    // End of the previous month
        ])
        ->sum('data');

        $mpay = Finance::where('description', 'No. of mPAY Users')
        ->whereBetween('date', [
            now()->subMonth()->startOfMonth(), // Start of the previous month
            now()->subMonth()->endOfMonth()    // End of the previous month
        ])
        ->sum('data');

        $loans = Finance::where('description', 'Total Loans (in million)')
        ->whereBetween('date', [
            now()->subMonth()->startOfMonth(), // Start of the previous month
            now()->subMonth()->endOfMonth()    // End of the previous month
        ])
        ->sum('data');

        return [
            //First Row
            Stat::make('Total Customers', $assets."M")
            ->descriptionIcon('heroicon-m-arrow-trending-up')
            ->view('stat-image', ['assets' => $assets . "M", 'imagePath' => 'images/assets.png', 'title' => 'Total Assets']),
            Stat::make('Total Employees', $loans."M")
            ->descriptionIcon('heroicon-m-arrow-trending-up')
            ->view('stat-image', ['assets' => $assets . "M", 'imagePath' => 'images/discount-bag.gif', 'title' => 'Total Loans']),
            Stat::make('Total Deposits', $deposits."M")
            ->descriptionIcon('heroicon-m-arrow-trending-up')
            ->view('stat-image', ['assets' => $assets . "M", 'imagePath' => 'images/save-money.gif', 'title' => 'Total Deposit']),
            Stat::make('Total Deposits', $deposits."M")
            ->descriptionIcon('heroicon-m-arrow-trending-up')
            ->view('stat-image', ['assets' => $assets . "M", 'imagePath' => 'images/loan-account.png', 'title' => 'No of Loan Accounts']),

            //Second Row
            Stat::make('Total Customers', $assets."M")
            ->descriptionIcon('heroicon-m-arrow-trending-up')
            ->view('stat-image', ['assets' => $assets . "M", 'imagePath' => 'images/loan-client.png', 'title' => 'No of Loan Clients']),
            Stat::make('Total Employees', $loans."M")
            ->descriptionIcon('heroicon-m-arrow-trending-up')
            ->view('stat-image', ['assets' => $assets . "M", 'imagePath' => 'images/customer.gif', 'title' => 'Total Customers']),
            Stat::make('Total Deposits', $deposits."M")
            ->descriptionIcon('heroicon-m-arrow-trending-up')
            ->view('stat-image', ['assets' => $assets . "M", 'imagePath' => 'images/malefemale.png', 'title' => 'Total Employees']),
            Stat::make('Total Deposits', $deposits."M")
            ->descriptionIcon('heroicon-m-arrow-trending-up')
            ->view('stat-image', ['assets' => $assets . "M", 'imagePath' => 'images/branch.gif', 'title' => 'No of Branches']),

            //Third Row
            Stat::make('Total Deposits', $deposits."M")
            ->descriptionIcon('heroicon-m-arrow-trending-up')
            ->view('stat-image', ['assets' => $assets . "M", 'imagePath' => 'images/extension.gif', 'title' => 'No of Extension']),
            Stat::make('Total Deposits', $deposits."M")
            ->descriptionIcon('heroicon-m-arrow-trending-up')
            ->view('stat-image', ['assets' => $assets . "M", 'imagePath' => 'images/npl.png', 'title' => 'Non Performing Loan (NPL)']),
            Stat::make('Total Deposits', $deposits."M")
            ->descriptionIcon('heroicon-m-arrow-trending-up')
            ->view('stat-image', ['assets' => $assets . "M", 'imagePath' => 'images/worldwide.gif', 'title' => 'International Payment Gateway Users']),
            Stat::make('Total Deposits', $deposits."M")
            ->descriptionIcon('heroicon-m-arrow-trending-up')
            ->view('stat-image', ['assets' => $assets . "M", 'imagePath' => 'images/mpay text.png', 'title' => 'mPay Users']),

             //Fourth Row
             Stat::make('Total Deposits', $deposits."M")
             ->descriptionIcon('heroicon-m-arrow-trending-up')
             ->view('stat-image', ['assets' => $assets . "M", 'imagePath' => 'images/mypay text.png', 'title' => 'myPay Users']),
             Stat::make('Total Deposits', $deposits."M")
             ->descriptionIcon('heroicon-m-arrow-trending-up')
             ->view('stat-image', ['assets' => $assets . "M", 'imagePath' => 'images/visa.png', 'title' => 'Visa Card (Debit & Credit)']),
             Stat::make('Total Deposits', $deposits."M")
             ->descriptionIcon('heroicon-m-arrow-trending-up')
             ->view('stat-image', ['assets' => $assets . "M", 'imagePath' => 'images/atm.gif', 'title' => 'ATM']),
             Stat::make('Total Deposits', $deposits."M")
             ->descriptionIcon('heroicon-m-arrow-trending-up')
             ->view('stat-image', ['assets' => $assets . "M", 'imagePath' => 'images/credit-card.gif', 'title' => 'ATM issued (Debit cards)']),

            //Fifth Row
            Stat::make('Total Deposits', $deposits."M")
            ->descriptionIcon('heroicon-m-arrow-trending-up')
            ->view('stat-image', ['assets' => $assets . "M", 'imagePath' => 'images/rupay.png', 'title' => 'Rupay card issued']),
            Stat::make('Total Deposits', $deposits."M")
            ->descriptionIcon('heroicon-m-arrow-trending-up')
            ->view('stat-image', ['assets' => $assets . "M", 'imagePath' => 'images/agency.png', 'title' => 'Ngotsab (Agency banking)']),
            Stat::make('Total Deposits', $deposits."M")
            ->descriptionIcon('heroicon-m-arrow-trending-up')
            ->view('stat-image', ['assets' => $assets . "M", 'imagePath' => 'images/qr-code.gif', 'title' => 'QR issued']),
            Stat::make('Total Deposits', $deposits."M")
            ->descriptionIcon('heroicon-m-arrow-trending-up')
            ->view('stat-image', ['assets' => $assets . "M", 'imagePath' => 'images/pos.gif', 'title' => 'POS machines']),

             //Sixth Row
             Stat::make('Total Deposits', $deposits."M")
             ->descriptionIcon('heroicon-m-arrow-trending-up')
             ->view('stat-image', ['assets' => $assets . "M", 'imagePath' => 'images/smart-house.gif', 'title' => 'Correspondent banks']),


             Stat::make('Total Deposits', $deposits."M")
             ->descriptionIcon('heroicon-m-arrow-trending-up')
             ->view('stat-image', ['assets' => $assets . "M", 'imagePath' => 'images/edc.gif', 'title' => 'Non Performing Loan (NPL)']),

        ];

    }


}
