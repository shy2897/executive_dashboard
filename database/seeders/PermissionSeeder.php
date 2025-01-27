<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('permissions')->insert([

            ['name' => 'finance.delete', 'guard_name' => 'filament'],
            ['name' => 'finance.view', 'guard_name' => 'filament'],
            ['name' => 'finance.create', 'guard_name' => 'filament'],
            ['name' => 'finance.update', 'guard_name' => 'filament'],
            ['name' => 'finance_graph.view', 'guard_name' => 'filament'],
            ['name' => 'operation.view', 'guard_name' => 'filament'],
            ['name' => 'operation.create', 'guard_name' => 'filament'],
            ['name' => 'operation.update', 'guard_name' => 'filament'],
            ['name' => 'operation.delete', 'guard_name' => 'filament'],
            ['name' => 'operation_graph.view', 'guard_name' => 'filament'],
            ['name' => 'bankingchannel.view', 'guard_name' => 'filament'],
            ['name' => 'bankingchannel.create', 'guard_name' => 'filament'],
            ['name' => 'bankingchannel.update', 'guard_name' => 'filament'],
            ['name' => 'bankingchannel.delete', 'guard_name' => 'filament'],
            ['name' => 'bankingchannel_graph.view', 'guard_name' => 'filament'],
            ['name' => 'hrm.view', 'guard_name' => 'filament'],
            ['name' => 'hrm.create', 'guard_name' => 'filament'],
            ['name' => 'hrm.update', 'guard_name' => 'filament'],
            ['name' => 'hrm.delete', 'guard_name' => 'filament'],
            ['name' => 'hrm_graph.view', 'guard_name' => 'filament'],

        ]);
    }
}
