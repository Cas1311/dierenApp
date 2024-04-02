<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Listing>
 */
class ListingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'petName' => $this->faker->name(),
            'petBreed' => $this->faker->name(),
            'hourRate' => $this->faker->numberBetween(5, 30),
            'location' => $this->faker->city(),
            'startDate' => $this->faker->date(),
            'endDate' => $this->faker->date(),
            'email' => $this->faker->companyEmail(),
            'tags' => 'Dog, Cat, Playful',
            'description' => $this->faker->paragraph(5),

        ];
    }
}
