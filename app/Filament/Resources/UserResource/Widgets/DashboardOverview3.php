<?php

namespace App\Filament\Resources\UserResource\Widgets;

use Carbon\Carbon;
use App\Models\BankingChannel;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use App\Models\Operation;

class DashboardOverview3 extends BaseWidget
{
    protected function getStats(): array
    {

        $latestMPay = BankingChannel::where('description', 'No. of mPAY Users')->max('date');
        $startMPay = Carbon::parse($latestMPay)->startOfMonth();
        $endMPay = Carbon::parse($latestMPay)->endOfMonth();
        $mpay = number_format(BankingChannel::where('description', 'No. of mPAY Users')
        ->whereBetween('date', [
            $startMPay, // Start of the latest month with data
            $endMPay    // End of the latest month with data
        ])
        ->sum('data'));

        $latestMyPay = BankingChannel::where('description', 'No. of MyPay Users')->max('date');
        $startMyPay = Carbon::parse($latestMyPay)->startOfMonth();
        $endMyPay = Carbon::parse($latestMyPay)->endOfMonth();
        $mypay = number_format(BankingChannel::where('description', 'No. of MyPay Users')
        ->whereBetween('date', [
            $startMyPay, // Start of the latest month with data
            $endMyPay    // End of the latest month with data
        ])
        ->sum('data'));

        $latestInternational = BankingChannel::where('description', 'International payment gateway users')->max('date');
        $startInternational = Carbon::parse($latestInternational)->startOfMonth();
        $endInternational = Carbon::parse($latestInternational)->endOfMonth();
        $international = number_format(BankingChannel::where('description', 'International payment gateway users')
        ->whereBetween('date', [
            $startInternational, // Start of the latest month with data
            $endInternational    // End of the latest month with data
        ])
        ->sum('data'));

        $latestAgency = BankingChannel::where('description', 'No. of Ngotshabs')->max('date');
        $startAgency = Carbon::parse($latestAgency)->startOfMonth();
        $endAgency = Carbon::parse($latestAgency)->endOfMonth();
        $agency = number_format(BankingChannel::where('description', 'No. of Ngotshabs')
        ->whereBetween('date', [
            $startAgency, // Start of the latest month with data
            $endAgency    // End of the latest month with data
        ])
        ->sum('data'));

        $latestATM = BankingChannel::where('description', 'No. of ATM Cards')->max('date');
        $startATM = Carbon::parse($latestATM)->startOfMonth();
        $endATM = Carbon::parse($latestATM)->endOfMonth();
        $atm = number_format(BankingChannel::where('description', 'No. of ATM Cards')
        ->whereBetween('date', [
            $startATM, // Start of the latest month with data
            $endATM    // End of the latest month with data
        ])
        ->sum('data'));

        $latestVisaINR = BankingChannel::where('description', 'No. of Visa Cards - INR')->max('date');
        $startVisaINR = Carbon::parse($latestVisaINR)->startOfMonth();
        $endVisaINR = Carbon::parse($latestVisaINR)->endOfMonth();
        $visa_inr = BankingChannel::where('description', 'No. of Visa Cards - INR')
        ->whereBetween('date', [
            $startVisaINR, // Start of the latest month with data
            $endVisaINR    // End of the latest month with data
        ])
        ->sum('data');

        $latestVisaUSD = BankingChannel::where('description', 'No. of Visa Cards - USD')->max('date');
        $startVisaUSD = Carbon::parse($latestVisaUSD)->startOfMonth();
        $endVisaUSD = Carbon::parse($latestVisaUSD)->endOfMonth();
        $visa_usd = BankingChannel::where('description', 'No. of Visa Cards - USD')
        ->whereBetween('date', [
            $startVisaUSD, // Start of the latest month with data
            $endVisaUSD    // End of the latest month with data
        ])
        ->sum('data');

        $visa = number_format($visa_inr + $visa_usd);

        $latestRupay = BankingChannel::where('description', 'No. of RuPay Cards')->max('date');
        $startRupay = Carbon::parse($latestRupay)->startOfMonth();
        $endRupay = Carbon::parse($latestRupay)->endOfMonth();
        $rupay = number_format(BankingChannel::where('description', 'No. of RuPay Cards')
        ->whereBetween('date', [
            $startRupay, // Start of the latest month with data
            $endRupay    // End of the latest month with data
        ])
        ->sum('data'));

        return [

            //mPay-myPay-Stat
            Stat::make('mPay-myPay-Stat', $mpay)
            ->descriptionIcon('heroicon-m-arrow-trending-up')
            ->view('mpay-mypay-stat', ['mpay_img' => 'images/mpay.png', 'mypay_img' => 'images/mypay.png',
                    'mpay' => $mpay, 'mypay' => $mypay, ]),

            //International-Agency-Stat
            Stat::make('International-Agency-Stat', $international)
            ->descriptionIcon('heroicon-m-arrow-trending-up')
            ->view('international-agency-stat', ['agency_img' => 'images/agency.png', 'international_img' => 'images/international.gif',
                    'international' => $international, 'agency' => $agency, ]),

            //Card-Stat
            Stat::make('Card-Stat', $atm)
            ->descriptionIcon('heroicon-m-arrow-trending-up')
            ->view('card-stat', ['atm_img' => 'images/bank-card.png', 'visa_img' => 'images/bnb_visa.png', 'rupay_img' => 'images/bnb_rupay.png',
                    'atm' => $atm, 'visa' => $visa, 'rupay' => $rupay,]),



        ];

    }


}
