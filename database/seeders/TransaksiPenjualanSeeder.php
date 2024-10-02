<?php

namespace Database\Seeders;

use App\Models\TransaksiPenjualan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TransaksiPenjualanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TransaksiPenjualan::factory()->count(500)->create();
    }
}
