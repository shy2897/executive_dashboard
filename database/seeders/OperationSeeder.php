<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class OperationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('operations')->insert([

            // No. of Deposit Products
            ['description' => 'No. of Deposit Products', 'date' => '2022-12-01', 'data' => '5'],
            ['description' => 'No. of Deposit Products', 'date' => '2023-12-01', 'data' => '5'],
            ['description' => 'No. of Deposit Products', 'date' => '2024-01-01', 'data' => '5'],
            ['description' => 'No. of Deposit Products', 'date' => '2024-02-01', 'data' => '5'],
            ['description' => 'No. of Deposit Products', 'date' => '2024-03-01', 'data' => '5'],
            ['description' => 'No. of Deposit Products', 'date' => '2024-04-01', 'data' => '5'],
            ['description' => 'No. of Deposit Products', 'date' => '2024-05-01', 'data' => '5'],
            ['description' => 'No. of Deposit Products', 'date' => '2024-06-01', 'data' => '5'],
            ['description' => 'No. of Deposit Products', 'date' => '2024-07-01', 'data' => '5'],
            ['description' => 'No. of Deposit Products', 'date' => '2024-08-01', 'data' => '5'],


            // No. of Deposit Accounts
            ['description' => 'No. of Deposit Accounts', 'date' => '2022-12-01', 'data' => '201028'],
            ['description' => 'No. of Deposit Accounts', 'date' => '2023-12-01', 'data' => '212835'],
            ['description' => 'No. of Deposit Accounts', 'date' => '2024-01-01', 'data' => '213667'],
            ['description' => 'No. of Deposit Accounts', 'date' => '2024-02-01', 'data' => '215125'],
            ['description' => 'No. of Deposit Accounts', 'date' => '2024-03-01', 'data' => '216766'],
            ['description' => 'No. of Deposit Accounts', 'date' => '2024-04-01', 'data' => '219062'],
            ['description' => 'No. of Deposit Accounts', 'date' => '2024-05-01', 'data' => '221047'],
            ['description' => 'No. of Deposit Accounts', 'date' => '2024-06-01', 'data' => '222412'],
            ['description' => 'No. of Deposit Accounts', 'date' => '2024-07-01', 'data' => '224220'],
            ['description' => 'No. of Deposit Accounts', 'date' => '2024-08-01', 'data' => '226041'],


            // No. of Deposit Clients
            ['description' => 'No. of Deposit Clients', 'date' => '2022-12-01', 'data' => '187844'],
            ['description' => 'No. of Deposit Clients', 'date' => '2023-12-01', 'data' => '199346'],
            ['description' => 'No. of Deposit Clients', 'date' => '2024-01-01', 'data' => '199780'],
            ['description' => 'No. of Deposit Clients', 'date' => '2024-02-01', 'data' => '200837'],
            ['description' => 'No. of Deposit Clients', 'date' => '2024-03-01', 'data' => '201907'],
            ['description' => 'No. of Deposit Clients', 'date' => '2024-04-01', 'data' => '203361'],
            ['description' => 'No. of Deposit Clients', 'date' => '2024-05-01', 'data' => '204525'],
            ['description' => 'No. of Deposit Clients', 'date' => '2024-06-01', 'data' => '205682'],
            ['description' => 'No. of Deposit Clients', 'date' => '2024-07-01', 'data' => '207368'],
            ['description' => 'No. of Deposit Clients', 'date' => '2024-08-01', 'data' => '208839'],


            // INR Inflow (in million)
            ['description' => 'INR Inflow (in million)', 'date' => '2022-12-01', 'data' => '520.46'],
            ['description' => 'INR Inflow (in million)', 'date' => '2023-12-01', 'data' => '626.27'],
            ['description' => 'INR Inflow (in million)', 'date' => '2024-01-01', 'data' => '534.137'],
            ['description' => 'INR Inflow (in million)', 'date' => '2024-02-01', 'data' => '345.719'],
            ['description' => 'INR Inflow (in million)', 'date' => '2024-03-01', 'data' => '601.71'],
            ['description' => 'INR Inflow (in million)', 'date' => '2024-04-01', 'data' => '881.76'],
            ['description' => 'INR Inflow (in million)', 'date' => '2024-05-01', 'data' => '748.76'],
            ['description' => 'INR Inflow (in million)', 'date' => '2024-06-01', 'data' => '646.69'],
            ['description' => 'INR Inflow (in million)', 'date' => '2024-07-01', 'data' => '498.32'],
            ['description' => 'INR Inflow (in million)', 'date' => '2024-08-01', 'data' => '496.7'],


            // INR Outflow (in million)
            ['description' => 'INR Outflow (in million)', 'date' => '2022-12-01', 'data' => '1286'],
            ['description' => 'INR Outflow (in million)', 'date' => '2023-12-01', 'data' => '1191.38'],
            ['description' => 'INR Outflow (in million)', 'date' => '2024-01-01', 'data' => '1189.09'],
            ['description' => 'INR Outflow (in million)', 'date' => '2024-02-01', 'data' => '1848.98'],
            ['description' => 'INR Outflow (in million)', 'date' => '2024-03-01', 'data' => '1117.62'],
            ['description' => 'INR Outflow (in million)', 'date' => '2024-04-01', 'data' => '2741.72'],
            ['description' => 'INR Outflow (in million)', 'date' => '2024-05-01', 'data' => '1442.83'],
            ['description' => 'INR Outflow (in million)', 'date' => '2024-06-01', 'data' => '1194.70'],
            ['description' => 'INR Outflow (in million)', 'date' => '2024-07-01', 'data' => '1448.74'],
            ['description' => 'INR Outflow (in million)', 'date' => '2024-08-01', 'data' => '1279.03'],


            // USD Inflow (in million)
            ['description' => 'USD Inflow (in million)', 'date' => '2022-12-01', 'data' => '12.474'],
            ['description' => 'USD Inflow (in million)', 'date' => '2023-12-01', 'data' => '14.35'],
            ['description' => 'USD Inflow (in million)', 'date' => '2024-01-01', 'data' => '14.3'],
            ['description' => 'USD Inflow (in million)', 'date' => '2024-02-01', 'data' => '21.16'],
            ['description' => 'USD Inflow (in million)', 'date' => '2024-03-01', 'data' => '19.59'],
            ['description' => 'USD Inflow (in million)', 'date' => '2024-04-01', 'data' => '20.32'],
            ['description' => 'USD Inflow (in million)', 'date' => '2024-05-01', 'data' => '17.35'],
            ['description' => 'USD Inflow (in million)', 'date' => '2024-06-01', 'data' => '16.77'],
            ['description' => 'USD Inflow (in million)', 'date' => '2024-07-01', 'data' => '15.7'],
            ['description' => 'USD Inflow (in million)', 'date' => '2024-08-01', 'data' => '21.25'],

            // USD Outflow (in million)
            ['description' => 'USD Outflow (in million)', 'date' => '2022-12-01', 'data' => '7.627'],
            ['description' => 'USD Outflow (in million)', 'date' => '2023-12-01', 'data' => '9.19'],
            ['description' => 'USD Outflow (in million)', 'date' => '2024-01-01', 'data' => '8.9'],
            ['description' => 'USD Outflow (in million)', 'date' => '2024-02-01', 'data' => '4.59'],
            ['description' => 'USD Outflow (in million)', 'date' => '2024-03-01', 'data' => '6.06'],
            ['description' => 'USD Outflow (in million)', 'date' => '2024-04-01', 'data' => '5.41'],
            ['description' => 'USD Outflow (in million)', 'date' => '2024-05-01', 'data' => '6.63'],
            ['description' => 'USD Outflow (in million)', 'date' => '2024-06-01', 'data' => '7.17'],
            ['description' => 'USD Outflow (in million)', 'date' => '2024-07-01', 'data' => '7.45'],
            ['description' => 'USD Outflow (in million)', 'date' => '2024-08-01', 'data' => '6.70'],


            // No. of Branches
            ['description' => 'No. of Branches', 'date' => '2022-12-01', 'data' => '12'],
            ['description' => 'No. of Branches', 'date' => '2023-12-01', 'data' => '11'],
            ['description' => 'No. of Branches', 'date' => '2024-01-01', 'data' => '11'],
            ['description' => 'No. of Branches', 'date' => '2024-02-01', 'data' => '11'],
            ['description' => 'No. of Branches', 'date' => '2024-03-01', 'data' => '11'],
            ['description' => 'No. of Branches', 'date' => '2024-04-01', 'data' => '11'],
            ['description' => 'No. of Branches', 'date' => '2024-05-01', 'data' => '11'],
            ['description' => 'No. of Branches', 'date' => '2024-06-01', 'data' => '11'],
            ['description' => 'No. of Branches', 'date' => '2024-07-01', 'data' => '11'],
            ['description' => 'No. of Branches', 'date' => '2024-08-01', 'data' => '11'],

            // No. of Extensions
            ['description' => 'No. of Extensions', 'date' => '2022-12-01', 'data' => '26'],
            ['description' => 'No. of Extensions', 'date' => '2023-12-01', 'data' => '22'],
            ['description' => 'No. of Extensions', 'date' => '2024-01-01', 'data' => '22'],
            ['description' => 'No. of Extensions', 'date' => '2024-02-01', 'data' => '22'],
            ['description' => 'No. of Extensions', 'date' => '2024-03-01', 'data' => '22'],
            ['description' => 'No. of Extensions', 'date' => '2024-04-01', 'data' => '22'],
            ['description' => 'No. of Extensions', 'date' => '2024-05-01', 'data' => '22'],
            ['description' => 'No. of Extensions', 'date' => '2024-06-01', 'data' => '22'],
            ['description' => 'No. of Extensions', 'date' => '2024-07-01', 'data' => '22'],
            ['description' => 'No. of Extensions', 'date' => '2024-08-01', 'data' => '22'],



        ]);


    }
}
