<?php

use App\Http\Controllers\ClassPrefixController;
use Illuminate\Support\Facades\Route;

Route::post('class-prefix', [ClassPrefixController::class, 'prefix']);
