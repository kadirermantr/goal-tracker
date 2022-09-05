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
}
