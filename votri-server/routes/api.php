<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClassPrefixController;
use App\Http\Controllers\TaskController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('auth/login', [AuthController::class, 'login']);
Route::post('class-prefix', [ClassPrefixController::class, 'prefix']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('user', [AuthController::class, 'user']);

    Route::get('tasks', [TaskController::class, 'index']);
});
