<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DescriptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('description_lists')->insert([

            //Finance
            ['description' => 'Total Assets (in million)', 'department' => 'finance'],
            ['description' => 'Total Loans (in million)', 'department' => 'finance'],
            ['description' => 'No. of Loan Products', 'department' => 'finance'],
            ['description' => 'No. of Loan Accounts', 'department' => 'finance'],
            ['description' => 'No. of Loan Clients', 'department' => 'finance'],
            ['description' => 'Loan Provisions (in million)', 'department' => 'finance'],
            ['description' => 'Gross NPL (in million)', 'department' => 'finance'],
            ['description' => 'Gross NPL (%)', 'department' => 'finance'],
            ['description' => 'Total Deposit (in million)', 'department' => 'finance'],

            // Operation
            ['description' => 'No. of Deposit Products', 'department' => 'operation'],
            ['description' => 'No. of Deposit Accounts', 'department' => 'operation'],
            ['description' => 'No. of Deposit Clients', 'department' => 'operation'],
            ['description' => 'INR Inflow (in million)', 'department' => 'operation'],
            ['description' => 'INR Outflow (in million)', 'department' => 'operation'],
            ['description' => 'USD Inflow (in million)', 'department' => 'operation'],
            ['description' => 'USD Outflow (in million)', 'department' => 'operation'],
            ['description' => 'No. of Branches', 'department' => 'operation'],
            ['description' => 'No. of Extensions', 'department' => 'operation'],

            // Banking Channel
            ['description' => 'No. of ATMs', 'department' => 'mpay'],
            ['description' => 'No. of ATM Cards', 'department' => 'mpay'],
            ['description' => 'No. of RuPay Cards', 'department' => 'mpay'],
            ['description' => 'No. of Visa Cards - INR', 'department' => 'mpay'],
            ['description' => 'No. of Visa Cards - USD', 'department' => 'mpay'],
            ['description' => 'No. of POS Machines - Old', 'department' => 'mpay'],
            ['description' => 'No. of POS Machines - New', 'department' => 'mpay'],
            ['description' => 'No. of QR Code Holders', 'department' => 'mpay'],
            ['description' => 'No. of mPAY Users', 'department' => 'mpay'],
            ['description' => 'No. of Features in mPAY', 'department' => 'mpay'],
            ['description' => 'No. of MyPay Users', 'department' => 'mpay'],
            ['description' => 'No. of Ngotshabs', 'department' => 'operation'],
            ['description' => 'Ngotshab Transaction count', 'department' => 'mpay'],
            ['description' => 'Ngotshab Transaction Amount (Thousand)', 'department' => 'mpay'],
            ['description' => 'Total Customers', 'department' => 'mpay'],
            ['description' => 'International payment gateway users', 'department' => 'mpay'],
            ['description' => 'Total Shares', 'department' => 'mpay'],
            ['description' => 'Total Shareholders', 'department' => 'mpay'],
            ['description' => 'Correspondent Banks', 'department' => 'mpay'],

            // HRM
            ['description' => 'No. of Employees at the end of Pr.month', 'department' => 'hrm'],
            ['description' => 'No. of employees recruited during the month', 'department' => 'hrm'],
            ['description' => 'No. of employees separated during the month', 'department' => 'hrm'],
            ['description' => 'Total no. of Employees at End of Month: (a+b)-c', 'department' => 'hrm'],
            ['description' => 'GENDER MIX', 'department' => 'hrm'],
            ['description' => 'Percentage of Male Employees', 'department' => 'hrm'],
            ['description' => 'Percentage of Female Employees', 'department' => 'hrm'],
            ['description' => 'ATTRITION', 'department' => 'hrm'],
            ['description' => 'Staff Attrition Rate for the Reported Month', 'department' => 'hrm'],
            ['description' => 'Cumulative Attrition for the Year', 'department' => 'hrm'],
            ['description' => 'STAFF BREAKUP', 'department' => 'hrm'],
            ['description' => 'Percentage of Employees in Core Functions', 'department' => 'hrm'],
            ['description' => 'Percentage of Employees in Support Functions', 'department' => 'hrm'],
        ]);
    }
}
