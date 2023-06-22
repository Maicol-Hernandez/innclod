<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Process>
 */
class ProcessFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'code' => $this->faker->randomElement(['ASP', 'ADM', 'INS', 'PSE', 'SPR']),
            'name' => $this->faker->randomElement(['Aspirantes',  'Admitidos', 'Inscripción', 'Proceso de Selección', 'Sin Proceso']),
        ];
    }
}
