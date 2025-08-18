<?php

namespace Database\Factories;

use App\Enums\gender;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Profile>
 */
class ProfileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'date_of_birth' =>  $this->faker->date,
            'gender' => $this->faker->randomElement(gender::cases()),
            'phone_number' => $this->faker->phoneNumber(),
            'street' => $this->faker->streetAddress,
            'city' => $this->faker->city,
            'state' => $this->faker->citySuffix,
            'zip_code' => $this->faker->numberBetween(1000, 5000),
            'country' => $this->faker->country,
            'profile_picture' => $this->faker->imageUrl,
            'bio' => $this->faker->sentence(100),
            'website' => $this->faker->url(),
            'x_url' => $this->faker->url(),
            'instagram_url' => $this->faker->url(),
            'github_repo_url' => $this->faker->url()
        ];
    }
}
