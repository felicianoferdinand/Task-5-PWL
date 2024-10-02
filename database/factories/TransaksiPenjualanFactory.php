<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class TransaksiPenjualanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'tanggal_transaksi'=>$this->faker->date('Y-m-d'),
            'nama_kasir' =>$this->faker->name(),
            'id_products' => Product::factory(),
            'jumlah_pembelian' => $this->faker->randomNumber(),
        ];
    }
}
