<?php

use App\Http\Controllers\ClassPrefixController;
use App\Http\Controllers\SelectResultController;
use Illuminate\Support\Facades\Route;

Route::post('class-prefix', [ClassPrefixController::class, 'prefix']);
Route::post('select-result', [SelectResultController::class, 'visualize']);
