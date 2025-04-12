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
            'name' => $this->faker->word(),
            'price' => $this->faker->randomFloat(2, 1, 100),
            'description' => $this->faker->sentence(),
            // 'user_id' => User::factory(),

            //z powodu braku rejestracji/logowania,
            // użyto hardcode 1-111 id dla 111 utworzonych użytkowników w bazie danych
            'user_id' => $this->faker->numberBetween(1, 111),
        ];
    }
}
