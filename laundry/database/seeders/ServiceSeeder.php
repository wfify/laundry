<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServiceSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('services')->insert([
            ['name' => 'Paket_A', 'price_per_kg' => 7000],
            ['name' => 'Paket_B', 'price_per_kg' => 10000],
            ['name' => 'Paket_C', 'price_per_kg' => 9000],
            ['name' => 'Cuci_Sepatu', 'price_per_kg' => 50000],
        ]);
    }
}
