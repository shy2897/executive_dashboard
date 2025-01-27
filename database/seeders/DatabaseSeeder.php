<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        $this->call(DescriptionSeeder::class);
        $this->call(FinanceSeeder::class);
        $this->call(OperationSeeder::class);
        $this->call(BankingChannelSeeder::class);
        $this->call(HRMSeeder::class);
        $this->call(PermissionSeeder::class);

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
    }
}
