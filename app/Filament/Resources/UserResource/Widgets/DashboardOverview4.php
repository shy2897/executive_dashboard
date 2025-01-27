<?php

namespace App\Filament\Resources\UserResource\Widgets;

use Carbon\Carbon;
use App\Models\BankingChannel;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class DashboardOverview4 extends BaseWidget
{
    protected function getStats(): array
    {

        $latestATM = BankingChannel::where('description', 'No. of ATMs')->max('date');
        $startATM = Carbon::parse($latestATM)->startOfMonth();
        $endATM = Carbon::parse($latestATM)->endOfMonth();
        $atm = number_format(BankingChannel::where('description', 'No. of ATMs')
        ->whereBetween('date', [
            $startATM, // Start of the latest month with data
            $endATM    // End of the latest month with data
        ])
        ->sum('data'));

        $latestPOSOld = BankingChannel::where('description', 'No. of POS Machines - Old')->max('date');
        $startPOSOld = Carbon::parse($latestPOSOld)->startOfMonth();
        $endPOSOld = Carbon::parse($latestPOSOld)->endOfMonth();
        $pos_old = BankingChannel::where('description', 'No. of POS Machines - Old')
        ->whereBetween('date', [
            $startPOSOld, // Start of the latest month with data
            $endPOSOld    // End of the latest month with data
        ])
        ->sum('data');

        $latestPOSNew = BankingChannel::where('description', 'No. of POS Machines - New')->max('date');
        $startPOSNew = Carbon::parse($latestPOSNew)->startOfMonth();
        $endPOSNew = Carbon::parse($latestPOSNew)->endOfMonth();
        $pos_new = BankingChannel::where('description', 'No. of POS Machines - New')
        ->whereBetween('date', [
            $startPOSNew, // Start of the latest month with data
            $endPOSNew    // End of the latest month with data
        ])
        ->sum('data');

        $pos = number_format($pos_new + $pos_old);

        $latestShare = BankingChannel::where('description', 'Total Shares')->max('date');
        $startShare = Carbon::parse($latestShare)->startOfMonth();
        $endShare = Carbon::parse($latestShare)->endOfMonth();
        $share = number_format(BankingChannel::where('description', 'Total Shares')
        ->whereBetween('date', [
            $startShare, // Start of the latest month with data
            $endShare    // End of the latest month with data
        ])
        ->sum('data'));

        $latestShareholder = BankingChannel::where('description', 'Total Shareholders')->max('date');
        $startShareholder = Carbon::parse($latestShareholder)->startOfMonth();
        $endShareholder = Carbon::parse($latestShareholder)->endOfMonth();
        $shareholder = number_format(BankingChannel::where('description', 'Total Shareholders')
        ->whereBetween('date', [
            $startShareholder, // Start of the latest month with data
            $endShareholder    // End of the latest month with data
        ])
        ->sum('data'));

        $latestQR = BankingChannel::where('description', 'No. of QR Code Holders')->max('date');
        $startQR = Carbon::parse($latestQR)->startOfMonth();
        $endQR = Carbon::parse($latestQR)->endOfMonth();
        $qr = number_format(BankingChannel::where('description', 'No. of QR Code Holders')
        ->whereBetween('date', [
            $startQR, // Start of the latest month with data
            $endQR    // End of the latest month with data
        ])
        ->sum('data'));

        $latestBank = BankingChannel::where('description', 'Correspondent Banks')->max('date');
        $startBank = Carbon::parse($latestBank)->startOfMonth();
        $endBank = Carbon::parse($latestBank)->endOfMonth();
        $bank = number_format(BankingChannel::where('description', 'Correspondent Banks')
        ->whereBetween('date', [
            $startBank, // Start of the latest month with data
            $endBank    // End of the latest month with data
        ])
        ->sum('data'));

        return [

            //ATM-POS-Stat
            Stat::make('Total Customers', $atm)
            ->descriptionIcon('heroicon-m-arrow-trending-up')
            ->view('atm-pos-stat',
            ['atm_img' => 'images/atm.gif', 'pos_img' => 'images/pos.gif',
                    'atm' => $atm, 'pos' => $pos,]),

            //Share-Shareholder-Stat
            Stat::make('Total Deposits', $share)
            ->descriptionIcon('heroicon-m-arrow-trending-up')
            ->view('share-stat', ['share_img' => 'images/share.png', 'shareholder_img' => 'images/shareholder.png',
                    'share' => $share, 'shareholder' => $shareholder,]),

            //QR-Bank-Stat
            Stat::make('Total Deposits', $qr)
            ->descriptionIcon('heroicon-m-arrow-trending-up')
            ->view('qr-bank-stat', ['qr_img' => 'images/qr-code.gif', 'bank_img' => 'images/smart-house.gif',
                    'qr' => $qr, 'bank' => $bank,]),

        ];

    }


}
