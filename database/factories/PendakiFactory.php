<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pendaki>
 */
class PendakiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'NIK' => $this->faker->unique()->numerify('##############'),
            'nama' => $this->faker->name(1),
            'alamat' => $this->faker->address(1),
            'no_hp' => $this->faker->numerify('###########'),
        ];
    }
}
