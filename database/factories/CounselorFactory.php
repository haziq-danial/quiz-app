<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Counselor>
 */
class CounselorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'UserID' => 0,
            'staff_id' => $this->faker->regexify('[A-Z]{4}[0-9]{4}'),
        ];
    }
}
