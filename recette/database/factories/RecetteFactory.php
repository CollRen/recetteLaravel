<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;




/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Recette>
 */
class RecetteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
{
    return [
        'titre' => $this->faker->sentence,
        'description' => $this->faker->paragraph,
        'temps_preparation' => $this->faker->randomDigit(),
        'temps_cuisson' => $this->faker->randomDigit(),
        'created_at' => $this->faker->dateTimeBetween('-1 year', 'now')->format('Y-m-d'),
        'user_id' => User::factory()
    ];
}
}
