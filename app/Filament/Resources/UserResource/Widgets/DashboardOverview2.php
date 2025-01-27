<?php

namespace App\Filament\Resources\UserResource\Widgets;

use App\Models\HRM;
use App\Models\Finance;
use App\Models\Operation;
use Illuminate\Support\Carbon;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class DashboardOverview2 extends BaseWidget
{
    protected function getStats(): array
    {
        $latestEmployee = HRM::where('description', 'Total no. of Employees at End of Month: (a+b)-c')->max('date');
        $startEmployee = Carbon::parse($latestEmployee)->startOfMonth();
        $endEmployee = Carbon::parse($latestEmployee)->endOfMonth();
        $employees = number_format(HRM::where('description', 'Total no. of Employees at End of Month: (a+b)-c')
        ->whereBetween('date', [
            $startEmployee, // Start of the latest month with data
            $endEmployee    // End of the latest month with data
        ])
        ->sum('data'));

        $latestMale = HRM::where('description', 'Percentage of Male Employees')->max('date');
        $startMale = Carbon::parse($latestMale)->startOfMonth();
        $endMale = Carbon::parse($latestMale)->endOfMonth();
        $male_percentage = number_format(HRM::where('description', 'Percentage of Male Employees')
        ->whereBetween('date', [
            $startMale, // Start of the latest month with data
            $endMale    // End of the latest month with data
        ])
        ->sum('data'));

        $latestFemale = HRM::where('description', 'Percentage of Female Employees')->max('date');
        $startFemale = Carbon::parse($latestFemale)->startOfMonth();
        $endFemale = Carbon::parse($latestFemale)->endOfMonth();
        $female_percentage = number_format(HRM::where('description', 'Percentage of Female Employees')
        ->whereBetween('date', [
            $startFemale, // Start of the latest month with data
            $endFemale    // End of the latest month with data
        ])
        ->sum('data'));

        $male = round(($male_percentage * $employees) / 100);
        $female = round(($female_percentage * $employees) / 100);

        $latestBranch = Operation::where('description', 'No. of Branches')->max('date');
        $startBranch = Carbon::parse($latestBranch)->startOfMonth();
        $endBranch = Carbon::parse($latestBranch)->endOfMonth();
        $branch = number_format(Operation::where('description', 'No. of Branches')
        ->whereBetween('date', [
            $startBranch, // Start of the latest month with data
            $endBranch    // End of the latest month with data
        ])
        ->sum('data'));

        $latestExtension = Operation::where('description', 'No. of Extensions')->max('date');
        $startExtension = Carbon::parse($latestExtension)->startOfMonth();
        $endExtension = Carbon::parse($latestExtension)->endOfMonth();
        $extension = number_format(Operation::where('description', 'No. of Extensions')
        ->whereBetween('date', [
            $startExtension, // Start of the latest month with data
            $endExtension    // End of the latest month with data
        ])
        ->sum('data'));

        $latestNPL = Finance::where('description', 'Gross NPL (in million)')->max('date');
        $startNPL = Carbon::parse($latestNPL)->startOfMonth();
        $endNPL = Carbon::parse($latestNPL)->endOfMonth();
        $npl = number_format(Finance::where('description', 'Gross NPL (in million)')
        ->whereBetween('date', [
            $startNPL, // Start of the latest month with data
            $endNPL    // End of the latest month with data
        ])
        ->sum('data'));

        $latestClient = Finance::where('description', 'No. of Loan Clients')->max('date');
        $startClient = Carbon::parse($latestClient)->startOfMonth();
        $endClient = Carbon::parse($latestClient)->endOfMonth();
        $clients = number_format(Finance::where('description', 'No. of Loan Clients')
        ->whereBetween('date', [
            $startClient, // Start of the latest month with data
            $endClient    // End of the latest month with data
        ])
        ->sum('data'));

        $latestAccount = Finance::where('description', 'No. of Loan Accounts')->max('date');
        $startAccount = Carbon::parse($latestAccount)->startOfMonth();
        $endAccount = Carbon::parse($latestAccount)->endOfMonth();
        $accounts = number_format(Finance::where('description', 'No. of Loan Accounts')
        ->whereBetween('date', [
            $startAccount, // Start of the latest month with data
            $endAccount    // End of the latest month with data
        ])
        ->sum('data'));

        return [
            //Employee-Gender-Stat
            Stat::make('Gender-Stat', $employees)
            ->descriptionIcon('heroicon-m-arrow-trending-up')
            ->view('employee-gender-stat',
            ['imagePath' => 'images/malefemale.png', 'male_img' => 'images/male.gif', 'female_img' => 'images/female.gif',
                    'employees' => $employees, 'male' => $male, 'female' => $female,]),

            //Branch-Extansion-NPL-Stat
            Stat::make('Branch-Extansion-NPL-Stat', $npl)
            ->descriptionIcon('heroicon-m-arrow-trending-up')
            ->view('branch-extension-npl-stat', ['npl' => $npl, 'npl_img' => 'images/loan.png', 'account' => 'images/branch.gif', 'client' => 'images/extension.gif',
                    'branch' => $branch, 'extension' => $extension, 'npl' => $npl . "M",]),

            //Loan-Clients-Accounts-Stat
            Stat::make('Loan-Clients-Accounts-Stat', $clients)
            ->descriptionIcon('heroicon-m-arrow-trending-up')
            ->view('loan-client-account-stat', ['extansion' => 'images/loan-account.png', 'branch' => 'images/loan-client.png',
                    'clients' => $clients, 'accounts' => $accounts, ]),

        ];

    }


}
