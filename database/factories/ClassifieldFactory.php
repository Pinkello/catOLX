<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Classifield>
 */
class ClassifieldFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => implode(' ', $this->faker->words(rand(3, 5))),
            'price' => $this->faker->randomFloat(2, 1, 100),
            'description' => implode(' ', $this->faker->sentences(rand(5, 10))),

            // nie mamy logowania/rejestracji więc losujemy randomowe id
            'user_id' => User::getRandomId(),
        ];
    }
}
