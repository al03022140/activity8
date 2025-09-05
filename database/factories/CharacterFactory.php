<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Universe;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Character>
 */
class CharacterFactory extends Factory
{
    protected $model = \App\Models\Character::class;

    public function definition(): array
    {
        return [
            'name'        => $this->faker->unique()->firstName(),
            'real_name'   => $this->faker->name(),
            'gender'      => $this->faker->randomElement(['Male', 'Female']),
            'universe_id' => Universe::factory(),
        ];
    }
}
