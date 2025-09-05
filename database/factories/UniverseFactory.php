<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Universe>
 */
class UniverseFactory extends Factory
{
    protected $model = \App\Models\Universe::class;

    public function definition(): array
    {
        return [
            'universe' => $this->faker->unique()->word(),
            'company'  => $this->faker->company(),
            'age'      => $this->faker->numberBetween(50, 100) . ' years',
        ];
    }
}
