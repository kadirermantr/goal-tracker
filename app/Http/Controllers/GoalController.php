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
     * @param $id
     * @return JsonResponse
     */
    public function show($id): JsonResponse
    {
        $goal = Goal::find($id);

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

        return $this->show($goal->id);
    }

    /**
     * @param $id
     * @return JsonResponse
     */
    public function destroy($id): JsonResponse
    {
        $goal = Goal::find($id);

        if ($goal) {
            $goal->destroy($id);

            return Replier::responseSuccess([
                'message' => 'Goal deleted'
            ]);
        }

        return Replier::responseFalse([
            'message' => 'Goal not found'
        ]);
    }
}
