<?php

namespace Database\Factories;

use App\Models\Classifield;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Photo>
 */
class PhotoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'classifield_id' => Classifield::getRandomId(),
            'path' => 'photos/' . $this->faker->image('storage/app/public/photos', 640, 480, null, false),
        ];
    }
}
