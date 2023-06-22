<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Document>
 */
class DocumentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $process = $this->faker->randomElement(['ASP', 'ADM', 'INS']);
        $type = $this->faker->randomElement(['CC', 'CON', 'TI', 'PEX']);
        $consecutivo = $this->faker->numberBetween(1, 10);
        $code = "{$type}-{$process}-{$consecutivo}";
        return [
            'name' => $this->faker->randomElement(['INSTRUCTIVO DE DESARROLLO', 'INSTRUCTIVO DE COMPLEMENTARIO', 'INSTRUCTIVO DE FINALIZACIÓN']),
            'description' => $this->faker->paragraphs(3, true),
        ];
    }
}
