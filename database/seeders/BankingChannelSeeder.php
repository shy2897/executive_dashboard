<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BankingChannelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('banking_channels')->insert([

            // No. of ATMs
            ['description' => 'No. of ATMs', 'date' => '2022-12-01', 'data' => '53'],
            ['description' => 'No. of ATMs', 'date' => '2023-01-01', 'data' => '54'],
            ['description' => 'No. of ATMs', 'date' => '2024-01-01', 'data' => '54'],
            ['description' => 'No. of ATMs', 'date' => '2024-02-01', 'data' => '54'],
            ['description' => 'No. of ATMs', 'date' => '2024-03-01', 'data' => '55'],
            ['description' => 'No. of ATMs', 'date' => '2024-04-01', 'data' => '55'],
            ['description' => 'No. of ATMs', 'date' => '2024-05-01', 'data' => '55'],
            ['description' => 'No. of ATMs', 'date' => '2024-06-01', 'data' => '55'],
            ['description' => 'No. of ATMs', 'date' => '2024-07-01', 'data' => '55'],
            ['description' => 'No. of ATMs', 'date' => '2024-08-01', 'data' => '55'],


            // No. of ATM Cards
            ['description' => 'No. of ATM Cards', 'date' => '2022-12-01', 'data' => '132578'],
            ['description' => 'No. of ATM Cards', 'date' => '2023-01-01', 'data' => '86468'],
            ['description' => 'No. of ATM Cards', 'date' => '2024-01-01', 'data' => '86808'],
            ['description' => 'No. of ATM Cards', 'date' => '2024-02-01', 'data' => '87270'],
            ['description' => 'No. of ATM Cards', 'date' => '2024-03-01', 'data' => '87737'],
            ['description' => 'No. of ATM Cards', 'date' => '2024-04-01', 'data' => '88054'],
            ['description' => 'No. of ATM Cards', 'date' => '2024-05-01', 'data' => '76268'],
            ['description' => 'No. of ATM Cards', 'date' => '2024-06-01', 'data' => '89095'],
            ['description' => 'No. of ATM Cards', 'date' => '2024-07-01', 'data' => '89729'],
            ['description' => 'No. of ATM Cards', 'date' => '2024-08-01', 'data' => '90222'],


            // No. of RuPay Cards
            ['description' => 'No. of RuPay Cards', 'date' => '2022-12-01', 'data' => '7396'],
            ['description' => 'No. of RuPay Cards', 'date' => '2023-01-01', 'data' => '11210'],
            ['description' => 'No. of RuPay Cards', 'date' => '2024-01-01', 'data' => '11213'],
            ['description' => 'No. of RuPay Cards', 'date' => '2024-02-01', 'data' => '11213'],
            ['description' => 'No. of RuPay Cards', 'date' => '2024-03-01', 'data' => '11214'],
            ['description' => 'No. of RuPay Cards', 'date' => '2024-04-01', 'data' => '11213'],
            ['description' => 'No. of RuPay Cards', 'date' => '2024-05-01', 'data' => '11212'],
            ['description' => 'No. of RuPay Cards', 'date' => '2024-06-01', 'data' => '12210'],
            ['description' => 'No. of RuPay Cards', 'date' => '2024-07-01', 'data' => '11208'],
            ['description' => 'No. of RuPay Cards', 'date' => '2024-08-01', 'data' => '11206'],


            // No. of Visa Cards - INR
            ['description' => 'No. of Visa Cards - INR', 'date' => '2022-12-01', 'data' => '366'],
            ['description' => 'No. of Visa Cards - INR', 'date' => '2023-01-01', 'data' => '435'],
            ['description' => 'No. of Visa Cards - INR', 'date' => '2024-01-01', 'data' => '436'],
            ['description' => 'No. of Visa Cards - INR', 'date' => '2024-02-01', 'data' => '446'],
            ['description' => 'No. of Visa Cards - INR', 'date' => '2024-03-01', 'data' => '440'],
            ['description' => 'No. of Visa Cards - INR', 'date' => '2024-04-01', 'data' => '448'],
            ['description' => 'No. of Visa Cards - INR', 'date' => '2024-05-01', 'data' => '477'],
            ['description' => 'No. of Visa Cards - INR', 'date' => '2024-06-01', 'data' => '449'],
            ['description' => 'No. of Visa Cards - INR', 'date' => '2024-07-01', 'data' => '488'],
            ['description' => 'No. of Visa Cards - INR', 'date' => '2024-08-01', 'data' => '490'],


            // No. of Visa Cards - USD
            ['description' => 'No. of Visa Cards - USD', 'date' => '2022-12-01', 'data' => '632'],
            ['description' => 'No. of Visa Cards - USD', 'date' => '2023-01-01', 'data' => '735'],
            ['description' => 'No. of Visa Cards - USD', 'date' => '2024-01-01', 'data' => '742'],
            ['description' => 'No. of Visa Cards - USD', 'date' => '2024-02-01', 'data' => '745'],
            ['description' => 'No. of Visa Cards - USD', 'date' => '2024-03-01', 'data' => '745'],
            ['description' => 'No. of Visa Cards - USD', 'date' => '2024-04-01', 'data' => '745'],
            ['description' => 'No. of Visa Cards - USD', 'date' => '2024-05-01', 'data' => '759'],
            ['description' => 'No. of Visa Cards - USD', 'date' => '2024-06-01', 'data' => '762'],
            ['description' => 'No. of Visa Cards - USD', 'date' => '2024-07-01', 'data' => '772'],
            ['description' => 'No. of Visa Cards - USD', 'date' => '2024-08-01', 'data' => '776'],


            // No. of POS Machines - New
            ['description' => 'No. of POS Machines - New', 'date' => '2022-12-01', 'data' => '0'],
            ['description' => 'No. of POS Machines - New', 'date' => '2023-01-01', 'data' => '14'],
            ['description' => 'No. of POS Machines - New', 'date' => '2024-01-01', 'data' => '21'],
            ['description' => 'No. of POS Machines - New', 'date' => '2024-02-01', 'data' => '21'],
            ['description' => 'No. of POS Machines - New', 'date' => '2024-03-01', 'data' => '21'],
            ['description' => 'No. of POS Machines - New', 'date' => '2024-04-01', 'data' => '21'],
            ['description' => 'No. of POS Machines - New', 'date' => '2024-05-01', 'data' => '21'],
            ['description' => 'No. of POS Machines - New', 'date' => '2024-06-01', 'data' => '21'],
            ['description' => 'No. of POS Machines - New', 'date' => '2024-07-01', 'data' => '21'],
            ['description' => 'No. of POS Machines - New', 'date' => '2024-08-01', 'data' => '21'],


            // No. of POS Machines - Old
            ['description' => 'No. of POS Machines - Old', 'date' => '2022-12-01', 'data' => '91'],
            ['description' => 'No. of POS Machines - Old', 'date' => '2023-01-01', 'data' => '92'],
            ['description' => 'No. of POS Machines - Old', 'date' => '2024-01-01', 'data' => '92'],
            ['description' => 'No. of POS Machines - Old', 'date' => '2024-02-01', 'data' => '92'],
            ['description' => 'No. of POS Machines - Old', 'date' => '2024-03-01', 'data' => '92'],
            ['description' => 'No. of POS Machines - Old', 'date' => '2024-04-01', 'data' => '92'],
            ['description' => 'No. of POS Machines - Old', 'date' => '2024-05-01', 'data' => '92'],
            ['description' => 'No. of POS Machines - Old', 'date' => '2024-06-01', 'data' => '92'],
            ['description' => 'No. of POS Machines - Old', 'date' => '2024-07-01', 'data' => '92'],
            ['description' => 'No. of POS Machines - Old', 'date' => '2024-08-01', 'data' => '92'],

            // No. of QR Code Holders
            ['description' => 'No. of QR Code Holders', 'date' => '2022-12-01', 'data' => '10883'],
            ['description' => 'No. of QR Code Holders', 'date' => '2023-01-01', 'data' => '13737'],
            ['description' => 'No. of QR Code Holders', 'date' => '2024-01-01', 'data' => '18962'],
            ['description' => 'No. of QR Code Holders', 'date' => '2024-02-01', 'data' => '19068'],
            ['description' => 'No. of QR Code Holders', 'date' => '2024-03-01', 'data' => '19218'],
            ['description' => 'No. of QR Code Holders', 'date' => '2024-04-01', 'data' => '19355'],
            ['description' => 'No. of QR Code Holders', 'date' => '2024-05-01', 'data' => '19498'],
            ['description' => 'No. of QR Code Holders', 'date' => '2024-06-01', 'data' => '19599'],
            ['description' => 'No. of QR Code Holders', 'date' => '2024-07-01', 'data' => '19599'],
            ['description' => 'No. of QR Code Holders', 'date' => '2024-08-01', 'data' => '19877'],


            //No. of mPAY Users
            ['description' => 'No. of mPAY Users', 'date' => '2022-12-01', 'data' => '94627'],
            ['description' => 'No. of mPAY Users', 'date' => '2023-12-01', 'data' => '115354'],
            ['description' => 'No. of mPAY Users', 'date' => '2024-01-01', 'data' => '116547'],
            ['description' => 'No. of mPAY Users', 'date' => '2024-02-01', 'data' => '117727'],
            ['description' => 'No. of mPAY Users', 'date' => '2024-03-01', 'data' => '119357'],
            ['description' => 'No. of mPAY Users', 'date' => '2024-04-01', 'data' => '121258'],
            ['description' => 'No. of mPAY Users', 'date' => '2024-05-01', 'data' => '122649'],
            ['description' => 'No. of mPAY Users', 'date' => '2024-06-01', 'data' => '123767'],
            ['description' => 'No. of mPAY Users', 'date' => '2024-07-01', 'data' => '125793'],
            ['description' => 'No. of mPAY Users', 'date' => '2024-08-01', 'data' => '127264'],


            //No. of Features in mPAY
            ['description' => 'No. of Features in mPAY', 'date' => '2022-12-01', 'data' => '64'],
            ['description' => 'No. of Features in mPAY', 'date' => '2023-12-01', 'data' => '66'],
            ['description' => 'No. of Features in mPAY', 'date' => '2024-01-01', 'data' => '67'],
            ['description' => 'No. of Features in mPAY', 'date' => '2024-02-01', 'data' => '67'],
            ['description' => 'No. of Features in mPAY', 'date' => '2024-03-01', 'data' => '67'],
            ['description' => 'No. of Features in mPAY', 'date' => '2024-04-01', 'data' => '67'],
            ['description' => 'No. of Features in mPAY', 'date' => '2024-05-01', 'data' => '67'],
            ['description' => 'No. of Features in mPAY', 'date' => '2024-06-01', 'data' => '68'],
            ['description' => 'No. of Features in mPAY', 'date' => '2024-07-01', 'data' => '68'],
            ['description' => 'No. of Features in mPAY', 'date' => '2024-08-01', 'data' => '68'],


            //No. of MyPay Users
            ['description' => 'No. of MyPay Users', 'date' => '2022-12-01', 'data' => ''],
            ['description' => 'No. of MyPay Users', 'date' => '2023-01-01', 'data' => '17526'],
            ['description' => 'No. of MyPay Users', 'date' => '2024-01-01', 'data' => '17979'],
            ['description' => 'No. of MyPay Users', 'date' => '2024-02-01', 'data' => '18391'],
            ['description' => 'No. of MyPay Users', 'date' => '2024-03-01', 'data' => '19086'],
            ['description' => 'No. of MyPay Users', 'date' => '2024-04-01', 'data' => '21506'],
            ['description' => 'No. of MyPay Users', 'date' => '2024-05-01', 'data' => '22061'],
            ['description' => 'No. of MyPay Users', 'date' => '2024-06-01', 'data' => '22540'],
            ['description' => 'No. of MyPay Users', 'date' => '2024-07-01', 'data' => '23008'],
            ['description' => 'No. of MyPay Users', 'date' => '2024-08-01', 'data' => '23246'],

            // Ngotshab Transaction count
            ['description' => 'Ngotshab Transaction count', 'date' => '2022-12-01', 'data' => '43005'],
            ['description' => 'Ngotshab Transaction count', 'date' => '2023-12-01', 'data' => '20965'],
            ['description' => 'Ngotshab Transaction count', 'date' => '2024-01-01', 'data' => '23983'],
            ['description' => 'Ngotshab Transaction count', 'date' => '2024-02-01', 'data' => '22710'],
            ['description' => 'Ngotshab Transaction count', 'date' => '2024-03-01', 'data' => '21052'],
            ['description' => 'Ngotshab Transaction count', 'date' => '2024-04-01', 'data' => '3232'],
            ['description' => 'Ngotshab Transaction count', 'date' => '2024-05-01', 'data' => '16234'],
            ['description' => 'Ngotshab Transaction count', 'date' => '2024-06-01', 'data' => '18264'],
            ['description' => 'Ngotshab Transaction count', 'date' => '2024-07-01', 'data' => '21816'],
            ['description' => 'Ngotshab Transaction count', 'date' => '2024-08-01', 'data' => '19570'],

            // Ngotshab Transaction Amount (Thousand)
            ['description' => 'Ngotshab Transaction Amount (Thousand)', 'date' => '2022-12-01', 'data' => '145423.37'],
            ['description' => 'Ngotshab Transaction Amount (Thousand)', 'date' => '2023-12-01', 'data' => '61119.83'],
            ['description' => 'Ngotshab Transaction Amount (Thousand)', 'date' => '2024-01-01', 'data' => '68238.38'],
            ['description' => 'Ngotshab Transaction Amount (Thousand)', 'date' => '2024-02-01', 'data' => '75738.07'],
            ['description' => 'Ngotshab Transaction Amount (Thousand)', 'date' => '2024-03-01', 'data' => '70054.86'],
            ['description' => 'Ngotshab Transaction Amount (Thousand)', 'date' => '2024-04-01', 'data' => '4679.42'],
            ['description' => 'Ngotshab Transaction Amount (Thousand)', 'date' => '2024-05-01', 'data' => '45487.58'],
            ['description' => 'Ngotshab Transaction Amount (Thousand)', 'date' => '2024-06-01', 'data' => '45958.25'],
            ['description' => 'Ngotshab Transaction Amount (Thousand)', 'date' => '2024-07-01', 'data' => '49688.36'],
            ['description' => 'Ngotshab Transaction Amount (Thousand)', 'date' => '2024-08-01', 'data' => '48092.98'],

            // No. of Ngotshabs
            ['description' => 'No. of Ngotshabs', 'date' => '2022-12-01', 'data' => '255'],
            ['description' => 'No. of Ngotshabs', 'date' => '2023-12-01', 'data' => '249'],
            ['description' => 'No. of Ngotshabs', 'date' => '2024-01-01', 'data' => '244'],
            ['description' => 'No. of Ngotshabs', 'date' => '2024-02-01', 'data' => '241'],
            ['description' => 'No. of Ngotshabs', 'date' => '2024-03-01', 'data' => '241'],
            ['description' => 'No. of Ngotshabs', 'date' => '2024-04-01', 'data' => '240'],
            ['description' => 'No. of Ngotshabs', 'date' => '2024-05-01', 'data' => '238'],
            ['description' => 'No. of Ngotshabs', 'date' => '2024-06-01', 'data' => '234'],
            ['description' => 'No. of Ngotshabs', 'date' => '2024-07-01', 'data' => '234'],
            ['description' => 'No. of Ngotshabs', 'date' => '2024-08-01', 'data' => '233'],

            //Total Customers
            ['description' => 'Total Customers', 'date' => '2024-08-01', 'data' => '23246'],

            //International payment gateway users
            ['description' => 'International payment gateway users', 'date' => '2024-08-01', 'data' => '23246'],

            //Total Shares
            ['description' => 'Total Shares', 'date' => '2024-08-01', 'data' => '23246'],

            //Total Shareholders
            ['description' => 'Total Shareholders', 'date' => '2024-08-01', 'data' => '23246'],

            //Correspondent Banks
            ['description' => 'Correspondent Banks', 'date' => '2024-08-01', 'data' => '23246'],

        ]);
    }
}
