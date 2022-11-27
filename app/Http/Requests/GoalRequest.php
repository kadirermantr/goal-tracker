<?php

namespace App\Http\Requests;

use App\Constants\GoalConstants;
use Illuminate\Foundation\Http\FormRequest;

class GoalRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'user_id' => ['required', 'exists:users,id'],
            'name' => ['required', 'string'],
            'description' => ['nullable'],
            'amount' => ['required', 'int'],
            'period' => ['required', 'string', 'in:'.implode(',', GoalConstants::PERIODS)],
            'start_date' => ['required'],
        ];
    }
}
