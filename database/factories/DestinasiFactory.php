<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class DestinasiFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;


    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $latitude = $this->faker->latitude(-5.5, -3.0);
        $longitude = $this->faker->longitude(120.0, 124.5);
        return [
            'name' => $this->faker->city . ' Beach',
            'description' => $this->faker->paragraph,
            'region' => $this->faker->city,
            'image' => 'default.jpg',
            'latitude' => $latitude,
            'longitude' => $longitude,
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    // public function unverified(): static
    // {
    //     return $this->state(fn(array $attributes) => [
    //         'email_verified_at' => null,
    //     ]);
    // }
}
