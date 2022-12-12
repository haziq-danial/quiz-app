<?php

namespace Database\Factories;

use App\Classes\Constants\RoleType;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'username' => $this->faker->userName(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'role_type' => $this->faker->numberBetween($min = 1, $max = 3),
            'full_name' => $this->faker->name(),
            'age' => $this->faker->numberBetween($min = 1, $max = 70),
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
    public function unverified()
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }

    public function admin()
    {
        return $this->state(function (array $attributes) {
            return [
                'role_type' => RoleType::ADMIN
            ];
        });
    }
    public function counselor()
    {
        return $this->state(function (array $attributes) {
            return [
                'role_type' => RoleType::COUNSELOR
            ];
        });
    }
    public function student()
    {
        return $this->state(function (array $attributes) {
            return [
                'role_type' => RoleType::STUDENT
            ];
        });
    }
}
