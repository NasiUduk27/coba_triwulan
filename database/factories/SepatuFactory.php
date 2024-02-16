<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Sepatu>
 */
class SepatuFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'merk' => $this->faker->randomElement(['Eiger', 'Columbia', 'The North Face', 'Mountain Hardwear', 'Kelty']),
            'ukuran' => $this->faker->numberBetween(26, 45),
            'warna' => $this->faker->randomElement(['Merah', 'Biru', 'Hijau', 'Kuning', 'Hitam']),
            'harga_sewa' => $this->faker->randomNumber(5),
        ];
    }
}
