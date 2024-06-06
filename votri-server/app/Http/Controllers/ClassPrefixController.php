<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClassPrefixRequest;
use App\Services\ClassPrefixService;
use Illuminate\Http\JsonResponse;

class ClassPrefixController extends Controller
{
    public function prefix(ClassPrefixRequest $request): JsonResponse
    {
        $code = $request->validated('code');
        $prefix = $request->validated('prefix');
        $prefixed = ClassPrefixService::addPrefixToClassNames($code, $prefix);

        return response()->json([
            'code' => $prefixed,
        ]);
    }
}
