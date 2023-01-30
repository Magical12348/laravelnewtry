<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Certificate>
 */
class CertificateFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'certificate_number' => $this->faker->numberBetween(10000, 1000000),
            'course_name' => $this->faker->word,
            'name' => $this->faker->name,
            'type' => $this->faker->word,
            'date' => $this->faker->date(),
        ];
    }
}
