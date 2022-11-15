<?php

namespace Database\Seeders;

use App\Models\UserGoal;
use Illuminate\Database\Seeder;

class UserGoalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        UserGoal::factory(30)->create();
    }
}
