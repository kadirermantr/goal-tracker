<?php

namespace Database\Factories;

use App\Constants\GoalConstants;
use App\Models\Goal;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

/**
 * @extends Factory<Goal>
 */
class GoalFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        $date = Carbon::create(fake()->dateTimeThisYear());

        $amount = fake()->randomDigit();

        $period = fake()->randomElement(GoalConstants::PERIODS);

        $totalDays = $amount * GoalConstants::PERIOD_VALUES[strtoupper($period)];

        return [
            'name' => fake()->text(30),
            'amount' => $amount,
            'period' => $period,
            'start_date' => $date,
            'finish_date' => $date->copy()->addDays($totalDays),
        ];
    }
}
