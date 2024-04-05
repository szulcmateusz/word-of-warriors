<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Warrior>
 */
class WarriorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->text(random_int(5, 20)),
            'points' => fake()->numberBetween(1, 400),
            'gold' => fake()->numberBetween(600, 4000),
            'strength' => fake()->numberBetween(1, 40),
            'agility' => fake()->numberBetween(1, 40),
        ];
    }
}
