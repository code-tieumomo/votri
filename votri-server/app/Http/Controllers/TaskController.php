<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\JsonResponse;

class TaskController extends Controller
{
    public function index(): JsonResponse
    {
        $tasks = Task::all();

        return response()->json($tasks);
    }
}
