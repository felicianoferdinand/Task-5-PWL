<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class SupplierFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'no_hp_pic_supplier' => $this->faker->numerify('+62###########'),
            'alamat_supplier' =>$this->faker->streetAddress(),
            'pic_name'=> $this->faker->unique()->name(),
            'name' => $this->faker->unique()->name,
        ];
    }
}
