<?php

namespace Database\Factories;

use App\Models\UserGoal;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<UserGoal>
 */
class UserGoalFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => fake()->randomDigitNotZero(),
            'goal_id' => fake()->randomDigitNotZero(),
        ];
    }
}
