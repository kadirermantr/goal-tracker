<?php

namespace App\Constants;

use Illuminate\Validation\Rules\Enum;

class GoalConstants extends Enum
{
    const PERIODS = [
        'DAILY' => 'daily',
        'WEEKLY' => 'weekly',
        'MONTHLY' => 'monthly',
        'YEARLY' => 'yearly'
    ];

    const PERIOD_VALUES = [
        'DAILY' => 1,
        'WEEKLY' => 7,
        'MONTHLY' => 30,
        'YEARLY' => 365
    ];
}
