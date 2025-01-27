<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class FinanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('finances')->insert([
            // Total Assets (in million)
            ['description' => 'Total Assets (in million)', 'date' => '2022-12-01', 'data' => '63506.34'],
            ['description' => 'Total Assets (in million)', 'date' => '2023-12-01', 'data' => '68901.91'],
            ['description' => 'Total Assets (in million)', 'date' => '2024-01-01', 'data' => '69724.60'],
            ['description' => 'Total Assets (in million)', 'date' => '2024-02-01', 'data' => '69713.95'],
            ['description' => 'Total Assets (in million)', 'date' => '2024-03-01', 'data' => '69779.89'],
            ['description' => 'Total Assets (in million)', 'date' => '2024-04-01', 'data' => '70629.15'],
            ['description' => 'Total Assets (in million)', 'date' => '2024-05-01', 'data' => '71180.33'],
            ['description' => 'Total Assets (in million)', 'date' => '2024-06-01', 'data' => '71912.53'],
            ['description' => 'Total Assets (in million)', 'date' => '2024-07-01', 'data' => '72695.35'],
            ['description' => 'Total Assets (in million)', 'date' => '2024-08-01', 'data' => '73723.1'],


            // Total Loans (in million)
            ['description' => 'Total Loans (in million)', 'date' => '2022-12-01', 'data' => '44724.47'],
            ['description' => 'Total Loans (in million)', 'date' => '2023-12-01', 'data' => '49371.72'],
            ['description' => 'Total Loans (in million)', 'date' => '2024-01-01', 'data' => '49267.25'],
            ['description' => 'Total Loans (in million)', 'date' => '2024-02-01', 'data' => '49072.36'],
            ['description' => 'Total Loans (in million)', 'date' => '2024-03-01', 'data' => '49428.20'],
            ['description' => 'Total Loans (in million)', 'date' => '2024-04-01', 'data' => '50795.73'],
            ['description' => 'Total Loans (in million)', 'date' => '2024-05-01', 'data' => '51334.16'],
            ['description' => 'Total Loans (in million)', 'date' => '2024-06-01', 'data' => '51615.35'],
            ['description' => 'Total Loans (in million)', 'date' => '2024-07-01', 'data' => '52355.24'],
            ['description' => 'Total Loans (in million)', 'date' => '2024-08-01', 'data' => '52813.45'],


            // No. of Loan Products
            ['description' => 'No. of Loan Products', 'date' => '2022-12-01', 'data' => '23'],
            ['description' => 'No. of Loan Products', 'date' => '2023-12-01', 'data' => '24'],
            ['description' => 'No. of Loan Products', 'date' => '2024-01-01', 'data' => '24'],
            ['description' => 'No. of Loan Products', 'date' => '2024-02-01', 'data' => '24'],
            ['description' => 'No. of Loan Products', 'date' => '2024-03-01', 'data' => '24'],
            ['description' => 'No. of Loan Products', 'date' => '2024-04-01', 'data' => '24'],
            ['description' => 'No. of Loan Products', 'date' => '2024-05-01', 'data' => '24'],
            ['description' => 'No. of Loan Products', 'date' => '2024-06-01', 'data' => '24'],
            ['description' => 'No. of Loan Products', 'date' => '2024-07-01', 'data' => '24'],
            ['description' => 'No. of Loan Products', 'date' => '2024-08-01', 'data' => '24'],


            // No. of Loan Accounts
            ['description' => 'No. of Loan Accounts', 'date' => '2022-12-01', 'data' => '24485'],
            ['description' => 'No. of Loan Accounts', 'date' => '2023-12-01', 'data' => '22717'],
            ['description' => 'No. of Loan Accounts', 'date' => '2024-01-01', 'data' => '22560'],
            ['description' => 'No. of Loan Accounts', 'date' => '2024-02-01', 'data' => '22325'],
            ['description' => 'No. of Loan Accounts', 'date' => '2024-03-01', 'data' => '22159'],
            ['description' => 'No. of Loan Accounts', 'date' => '2024-04-01', 'data' => '22121'],
            ['description' => 'No. of Loan Accounts', 'date' => '2024-05-01', 'data' => '22057'],
            ['description' => 'No. of Loan Accounts', 'date' => '2024-06-01', 'data' => '21827'],
            ['description' => 'No. of Loan Accounts', 'date' => '2024-07-01', 'data' => '22294'],
            ['description' => 'No. of Loan Accounts', 'date' => '2024-08-01', 'data' => '21996'],


            // No. of Loan Clients
            ['description' => 'No. of Loan Clients', 'date' => '2022-12-01', 'data' => '15504'],
            ['description' => 'No. of Loan Clients', 'date' => '2023-12-01', 'data' => '15831'],
            ['description' => 'No. of Loan Clients', 'date' => '2024-01-01', 'data' => '15769'],
            ['description' => 'No. of Loan Clients', 'date' => '2024-02-01', 'data' => '15648'],
            ['description' => 'No. of Loan Clients', 'date' => '2024-03-01', 'data' => '15581'],
            ['description' => 'No. of Loan Clients', 'date' => '2024-04-01', 'data' => '15580'],
            ['description' => 'No. of Loan Clients', 'date' => '2024-05-01', 'data' => '15581'],
            ['description' => 'No. of Loan Clients', 'date' => '2024-06-01', 'data' => '15581'],
            ['description' => 'No. of Loan Clients', 'date' => '2024-07-01', 'data' => '15626'],
            ['description' => 'No. of Loan Clients', 'date' => '2024-08-01', 'data' => '15181'],


            // Loan Provisions (in million)
            ['description' => 'Loan Provisions (in million)', 'date' => '2022-12-01', 'data' => '1919.10'],
            ['description' => 'Loan Provisions (in million)', 'date' => '2023-12-01', 'data' => '1707.34'],
            ['description' => 'Loan Provisions (in million)', 'date' => '2024-01-01', 'data' => '1607.24'],
            ['description' => 'Loan Provisions (in million)', 'date' => '2024-02-01', 'data' => '1919.30'],
            ['description' => 'Loan Provisions (in million)', 'date' => '2024-03-01', 'data' => '1900.84'],
            ['description' => 'Loan Provisions (in million)', 'date' => '2024-04-01', 'data' => '1951.11'],
            ['description' => 'Loan Provisions (in million)', 'date' => '2024-05-01', 'data' => '1970.76'],
            ['description' => 'Loan Provisions (in million)', 'date' => '2024-06-01', 'data' => '2174.66'],
            ['description' => 'Loan Provisions (in million)', 'date' => '2024-07-01', 'data' => '2077.93'],
            ['description' => 'Loan Provisions (in million)', 'date' => '2024-08-01', 'data' => '2260.4'],

            // Gross NPL (in million)
            ['description' => 'Gross NPL (in million)', 'date' => '2022-12-01', 'data' => '1537.99'],
            ['description' => 'Gross NPL (in million)', 'date' => '2023-12-01', 'data' => '1374.62'],
            ['description' => 'Gross NPL (in million)', 'date' => '2024-01-01', 'data' => '1889.84'],
            ['description' => 'Gross NPL (in million)', 'date' => '2024-02-01', 'data' => '1940.67'],
            ['description' => 'Gross NPL (in million)', 'date' => '2024-03-01', 'data' => '2034.27'],
            ['description' => 'Gross NPL (in million)', 'date' => '2024-04-01', 'data' => '1975.48'],
            ['description' => 'Gross NPL (in million)', 'date' => '2024-05-01', 'data' => '2080.79'],
            ['description' => 'Gross NPL (in million)', 'date' => '2024-06-01', 'data' => '2286.05'],
            ['description' => 'Gross NPL (in million)', 'date' => '2024-07-01', 'data' => '1912.48'],
            ['description' => 'Gross NPL (in million)', 'date' => '2024-08-01', 'data' => '2176.41'],


            // Gross NPL (%)
            ['description' => 'Gross NPL (%)', 'date' => '2022-12-01', 'data' => '3.44'],
            ['description' => 'Gross NPL (%)', 'date' => '2023-12-01', 'data' => '2.78'],
            ['description' => 'Gross NPL (%)', 'date' => '2024-01-01', 'data' => '3.84'],
            ['description' => 'Gross NPL (%)', 'date' => '2024-02-01', 'data' => '3.95'],
            ['description' => 'Gross NPL (%)', 'date' => '2024-03-01', 'data' => '4.12'],
            ['description' => 'Gross NPL (%)', 'date' => '2024-04-01', 'data' => '3.89'],
            ['description' => 'Gross NPL (%)', 'date' => '2024-05-01', 'data' => '4.05'],
            ['description' => 'Gross NPL (%)', 'date' => '2024-06-01', 'data' => '4.43'],
            ['description' => 'Gross NPL (%)', 'date' => '2024-07-01', 'data' => '3.65'],
            ['description' => 'Gross NPL (%)', 'date' => '2024-08-01', 'data' => '4.12'],


            // Total Deposit (in million)
            ['description' => 'Total Deposit (in million)', 'date' => '2022-12-01', 'data' => '51343.81'],
            ['description' => 'Total Deposit (in million)', 'date' => '2023-12-01', 'data' => '56796.95'],
            ['description' => 'Total Deposit (in million)', 'date' => '2024-01-01', 'data' => '57577.93'],
            ['description' => 'Total Deposit (in million)', 'date' => '2024-02-01', 'data' => '57645.94'],
            ['description' => 'Total Deposit (in million)', 'date' => '2024-03-01', 'data' => '57738.29'],
            ['description' => 'Total Deposit (in million)', 'date' => '2024-04-01', 'data' => '60032.36'],
            ['description' => 'Total Deposit (in million)', 'date' => '2024-05-01', 'data' => '60779.75'],
            ['description' => 'Total Deposit (in million)', 'date' => '2024-06-01', 'data' => '60900.20'],
            ['description' => 'Total Deposit (in million)', 'date' => '2024-07-01', 'data' => '61477.62'],
            ['description' => 'Total Deposit (in million)', 'date' => '2024-08-01', 'data' => '62268.34'],

            
        ]);
    }
}
