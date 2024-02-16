<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tenda>
 */
class TendaFactory extends Factory
{

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'merk_tenda' => $this->faker->randomElement(['Eiger', 'Columbia', 'The North Face', 'Mountain Hardwear', 'Kelty']),
            'kapasitas' => $this->faker->randomNumber(1),
            'sewaperhari' => $this->faker->randomNumber(5),
            'stok' => $this->faker->randomNumber(1),
        ];
    }
}
