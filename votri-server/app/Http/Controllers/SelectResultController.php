<?php

namespace App\Http\Controllers;

use App\Http\Requests\SelectResultVisualizeRequest;
use App\Services\SelectResultService;
use Exception;
use Illuminate\Http\JsonResponse;

class SelectResultController extends Controller
{
    /**
     * @throws Exception
     */
    public function visualize(SelectResultVisualizeRequest $request): JsonResponse
    {
        $result = $request->validated('result');
        $visualized = SelectResultService::visualize($result);

        return response()->json($visualized);
    }
}
