<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Jaket>
 */
class JaketFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'merk_jaket' => $this->faker->randomElement(['Adidas', 'Nike', 'Puma', 'Reebok', 'Vans']),
            'warna' => $this->faker->randomElement(['Merah', 'Biru', 'Hijau', 'Kuning', 'Hitam']),
            'sewaperhari' => $this->faker->randomNumber(5),
        ];
    }
}
