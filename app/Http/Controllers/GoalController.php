<?php

namespace App\Http\Controllers;

use App\Constants\GoalConstants;
use App\Http\Requests\GoalRequest;
use App\Models\Goal;
use App\Replier;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Carbon;

class GoalController extends Controller
{
    /**
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $goal = Goal::all();

        return Replier::responseSuccess($goal);
    }

    /**
     * @param Goal $goal
     * @return JsonResponse
     */
    public function show(Goal $goal): JsonResponse
    {
        return Replier::responseSuccess($goal);
    }

    /**
     * @param GoalRequest $request
     * @return JsonResponse
     */
    public function store(GoalRequest $request): JsonResponse
    {
        $totalDays = $request->amount * GoalConstants::PERIOD_VALUES[strtoupper($request->period)];

        $goal = Goal::create([
            'name' => $request->name,
            'amount' => $request->amount,
            'period' => $request->period,
            'start_date' => $request->start_date,
            'finish_date' => Carbon::create($request->start_date)->addDays($totalDays),
        ]);

        return $this->show($goal);
    }

    /**
     * @param Goal $goal
     * @return JsonResponse
     */
    public function destroy(Goal $goal): JsonResponse
    {
        $goal->destroy($goal->id);

        return Replier::responseFalse([
            'message' => 'Goal deleted'
        ]);
    }
}
