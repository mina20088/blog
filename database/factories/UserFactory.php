<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<\App\Models\user>
 */
class UserFactory extends Factory
{

    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
           'first_name' => $this->faker->firstName(),
            'last_name' => $this->faker->lastName(),
            'email' => $this->faker->unique()->safeEmail(),
            'username' => $this->faker->unique()->regexify('[A-Za-z0-9_]{5,14}'),
            'password' => $this->faker->password(),
            'locked' => $this->faker->boolean(),
        ];
    }

    public function locked(): Factory{
        return $this->state(function (array $attributes) {
            return [
                'locked' => true,
            ];
        });
    }
    public function unlocked(): Factory{
        return $this->state(function (array $attributes) {
            return [
                'locked' => false,
            ];
        });
    }
}
