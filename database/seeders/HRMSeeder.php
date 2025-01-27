<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class HRMSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('h_r_m_s')->insert([

            // Head Count - No. of Employees at the end of Pr.month
            ['description' => 'No. of Employees at the end of Pr.month', 'date' => '2022-12-01', 'data' => '534'],
            ['description' => 'No. of Employees at the end of Pr.month', 'date' => '2023-12-01', 'data' => '516'],
            ['description' => 'No. of Employees at the end of Pr.month', 'date' => '2024-01-01', 'data' => '548'],
            ['description' => 'No. of Employees at the end of Pr.month', 'date' => '2024-02-01', 'data' => '538'],
            ['description' => 'No. of Employees at the end of Pr.month', 'date' => '2024-03-01', 'data' => '534'],
            ['description' => 'No. of Employees at the end of Pr.month', 'date' => '2024-04-01', 'data' => '532'],
            ['description' => 'No. of Employees at the end of Pr.month', 'date' => '2024-05-01', 'data' => '532'],
            ['description' => 'No. of Employees at the end of Pr.month', 'date' => '2024-06-01', 'data' => '531'],
            ['description' => 'No. of Employees at the end of Pr.month', 'date' => '2024-07-01', 'data' => '526'],
            ['description' => 'No. of Employees at the end of Pr.month', 'date' => '2024-08-01', 'data' => '529'],


            // Head Count - No. of employees recruited during the month
            ['description' => 'No. of employees recruited during the month', 'date' => '2022-12-01', 'data' => '1'],
            ['description' => 'No. of employees recruited during the month', 'date' => '2023-12-01', 'data' => '40'],
            ['description' => 'No. of employees recruited during the month', 'date' => '2024-01-01', 'data' => '1'],
            ['description' => 'No. of employees recruited during the month', 'date' => '2024-02-01', 'data' => '0'],
            ['description' => 'No. of employees recruited during the month', 'date' => '2024-03-01', 'data' => '1'],
            ['description' => 'No. of employees recruited during the month', 'date' => '2024-04-01', 'data' => '2'],
            ['description' => 'No. of employees recruited during the month', 'date' => '2024-05-01', 'data' => '0'],
            ['description' => 'No. of employees recruited during the month', 'date' => '2024-06-01', 'data' => '0'],
            ['description' => 'No. of employees recruited during the month', 'date' => '2024-07-01', 'data' => '3'],
            ['description' => 'No. of employees recruited during the month', 'date' => '2024-08-01', 'data' => '0'],

            // Head Count - No. of employees separated during the month
            ['description' => 'No. of employees separated during the month', 'date' => '2022-12-01', 'data' => '6'],
            ['description' => 'No. of employees separated during the month', 'date' => '2023-12-01', 'data' => '8'],
            ['description' => 'No. of employees separated during the month', 'date' => '2024-01-01', 'data' => '11'],
            ['description' => 'No. of employees separated during the month', 'date' => '2024-02-01', 'data' => '4'],
            ['description' => 'No. of employees separated during the month', 'date' => '2024-03-01', 'data' => '3'],
            ['description' => 'No. of employees separated during the month', 'date' => '2024-04-01', 'data' => '2'],
            ['description' => 'No. of employees separated during the month', 'date' => '2024-05-01', 'data' => '1'],
            ['description' => 'No. of employees separated during the month', 'date' => '2024-06-01', 'data' => '5'],
            ['description' => 'No. of employees separated during the month', 'date' => '2024-07-01', 'data' => '0'],
            ['description' => 'No. of employees separated during the month', 'date' => '2024-08-01', 'data' => '3'],

            // Head Count - Total no. of Employees at End of Month: (a+b)-c
            ['description' => 'Total no. of Employees at End of Month: (a+b)-c', 'date' => '2022-12-01', 'data' => '529'],
            ['description' => 'Total no. of Employees at End of Month: (a+b)-c', 'date' => '2023-12-01', 'data' => '548'],
            ['description' => 'Total no. of Employees at End of Month: (a+b)-c', 'date' => '2024-01-01', 'data' => '538'],
            ['description' => 'Total no. of Employees at End of Month: (a+b)-c', 'date' => '2024-02-01', 'data' => '534'],
            ['description' => 'Total no. of Employees at End of Month: (a+b)-c', 'date' => '2024-03-01', 'data' => '532'],
            ['description' => 'Total no. of Employees at End of Month: (a+b)-c', 'date' => '2024-04-01', 'data' => '532'],
            ['description' => 'Total no. of Employees at End of Month: (a+b)-c', 'date' => '2024-05-01', 'data' => '531'],
            ['description' => 'Total no. of Employees at End of Month: (a+b)-c', 'date' => '2024-06-01', 'data' => '526'],
            ['description' => 'Total no. of Employees at End of Month: (a+b)-c', 'date' => '2024-07-01', 'data' => '529'],
            ['description' => 'Total no. of Employees at End of Month: (a+b)-c', 'date' => '2024-08-01', 'data' => '526'],

            // GENDER MIX - Percentage of Male Employees
            ['description' => 'Percentage of Male Employees', 'date' => '2022-12-01', 'data' => '57'],
            ['description' => 'Percentage of Male Employees', 'date' => '2023-12-01', 'data' => '54.20'],
            ['description' => 'Percentage of Male Employees', 'date' => '2024-01-01', 'data' => '54.28'],
            ['description' => 'Percentage of Male Employees', 'date' => '2024-02-01', 'data' => '54.12'],
            ['description' => 'Percentage of Male Employees', 'date' => '2024-03-01', 'data' => '54.14'],
            ['description' => 'Percentage of Male Employees', 'date' => '2024-04-01', 'data' => '54.32'],
            ['description' => 'Percentage of Male Employees', 'date' => '2024-05-01', 'data' => '54.43'],
            ['description' => 'Percentage of Male Employees', 'date' => '2024-06-01', 'data' => '54.56'],
            ['description' => 'Percentage of Male Employees', 'date' => '2024-07-01', 'data' => '54.63'],
            ['description' => 'Percentage of Male Employees', 'date' => '2024-08-01', 'data' => '54.75'],



            // GENDER MIX - Percentage of Female Employees
            ['description' => 'Percentage of Female Employees', 'date' => '2022-12-01', 'data' => '43'],
            ['description' => 'Percentage of Female Employees', 'date' => '2023-12-01', 'data' => '45.80'],
            ['description' => 'Percentage of Female Employees', 'date' => '2024-01-01', 'data' => '45.72'],
            ['description' => 'Percentage of Female Employees', 'date' => '2024-02-01', 'data' => '45.88'],
            ['description' => 'Percentage of Female Employees', 'date' => '2024-03-01', 'data' => '45.86'],
            ['description' => 'Percentage of Female Employees', 'date' => '2024-04-01', 'data' => '45.68'],
            ['description' => 'Percentage of Female Employees', 'date' => '2024-05-01', 'data' => '45.57'],
            ['description' => 'Percentage of Female Employees', 'date' => '2024-06-01', 'data' => '45.44'],
            ['description' => 'Percentage of Female Employees', 'date' => '2024-07-01', 'data' => '45.37'],
            ['description' => 'Percentage of Female Employees', 'date' => '2024-08-01', 'data' => '45.25'],


            // ATTRITION - Staff Attrition Rate for the Reported Month
            ['description' => 'Staff Attrition Rate for the Reported Month', 'date' => '2022-12-01', 'data' => '1.14'],
            ['description' => 'Staff Attrition Rate for the Reported Month', 'date' => '2023-12-01', 'data' => '1.46'],
            ['description' => 'Staff Attrition Rate for the Reported Month', 'date' => '2024-01-01', 'data' => '2.04'],
            ['description' => 'Staff Attrition Rate for the Reported Month', 'date' => '2024-02-01', 'data' => '0.75'],
            ['description' => 'Staff Attrition Rate for the Reported Month', 'date' => '2024-03-01', 'data' => '0.56'],
            ['description' => 'Staff Attrition Rate for the Reported Month', 'date' => '2024-04-01', 'data' => '0.38'],
            ['description' => 'Staff Attrition Rate for the Reported Month', 'date' => '2024-05-01', 'data' => '0.19'],
            ['description' => 'Staff Attrition Rate for the Reported Month', 'date' => '2024-06-01', 'data' => '0.95'],
            ['description' => 'Staff Attrition Rate for the Reported Month', 'date' => '2024-07-01', 'data' => '0'],
            ['description' => 'Staff Attrition Rate for the Reported Month', 'date' => '2024-08-01', 'data' => '0.57'],


            // ATTRITION - Cumulative Attrition for the Year
            ['description' => 'Cumulative Attrition for the Year', 'date' => '2023-12-01', 'data' => '19.71'],
            ['description' => 'Cumulative Attrition for the Year', 'date' => '2024-01-01', 'data' => '2.04'],
            ['description' => 'Cumulative Attrition for the Year', 'date' => '2024-02-01', 'data' => '2.76'],
            ['description' => 'Cumulative Attrition for the Year', 'date' => '2024-03-01', 'data' => '3.33'],
            ['description' => 'Cumulative Attrition for the Year', 'date' => '2024-04-01', 'data' => '3.72'],
            ['description' => 'Cumulative Attrition for the Year', 'date' => '2024-05-01', 'data' => '3.91'],
            ['description' => 'Cumulative Attrition for the Year', 'date' => '2024-06-01', 'data' => '4.85'],
            ['description' => 'Cumulative Attrition for the Year', 'date' => '2024-07-01', 'data' => '4.87'],
            ['description' => 'Cumulative Attrition for the Year', 'date' => '2024-08-01', 'data' => '5.43'],


            // STAFF BREAKUP - Percentage of Employees in Core Functions
            ['description' => 'Percentage of Employees in Core Functions', 'date' => '2022-12-01', 'data' => '48'],
            ['description' => 'Percentage of Employees in Core Functions', 'date' => '2023-12-01', 'data' => '51.09'],
            ['description' => 'Percentage of Employees in Core Functions', 'date' => '2024-01-01', 'data' => '54.09'],
            ['description' => 'Percentage of Employees in Core Functions', 'date' => '2024-02-01', 'data' => '53.93'],
            ['description' => 'Percentage of Employees in Core Functions', 'date' => '2024-03-01', 'data' => '53.95'],
            ['description' => 'Percentage of Employees in Core Functions', 'date' => '2024-04-01', 'data' => '53.76'],
            ['description' => 'Percentage of Employees in Core Functions', 'date' => '2024-05-01', 'data' => '53.67'],
            ['description' => 'Percentage of Employees in Core Functions', 'date' => '2024-06-01', 'data' => '53.42'],
            ['description' => 'Percentage of Employees in Core Functions', 'date' => '2024-07-01', 'data' => '53.69'],
            ['description' => 'Percentage of Employees in Core Functions', 'date' => '2024-08-01', 'data' => '53.61'],


            // STAFF BREAKUP - Percentage of Employees in Support Functions
            ['description' => 'Percentage of Employees in Support Functions', 'date' => '2022-12-01', 'data' => '52'],
            ['description' => 'Percentage of Employees in Support Functions', 'date' => '2023-12-01', 'data' => '48.91'],
            ['description' => 'Percentage of Employees in Support Functions', 'date' => '2024-01-01', 'data' => '45.91'],
            ['description' => 'Percentage of Employees in Support Functions', 'date' => '2024-02-01', 'data' => '46.07'],
            ['description' => 'Percentage of Employees in Support Functions', 'date' => '2024-03-01', 'data' => '46.05'],
            ['description' => 'Percentage of Employees in Support Functions', 'date' => '2024-04-01', 'data' => '46.24'],
            ['description' => 'Percentage of Employees in Support Functions', 'date' => '2024-05-01', 'data' => '46.33'],
            ['description' => 'Percentage of Employees in Support Functions', 'date' => '2024-06-01', 'data' => '46.58'],
            ['description' => 'Percentage of Employees in Support Functions', 'date' => '2024-07-01', 'data' => '46.31'],
            ['description' => 'Percentage of Employees in Support Functions', 'date' => '2024-08-01', 'data' => '46.39'],


        ]);
    }
}
