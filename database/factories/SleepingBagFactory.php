<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SleepingBag>
 */
class SleepingBagFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'merk_sb' => $this->faker->randomElement(['Eiger', 'Columbia', 'The North Face', 'Mountain Hardwear', 'Kelty']),
            'warna' => $this->faker->randomElement(['Merah', 'Biru', 'Hijau', 'Kuning', 'Hitam']),
            'sewaperhari' => $this->faker->randomNumber(5),
        ];
    }
}
