<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RestController;
use App\Http\Controllers\LikeController;

Route::apiResource('/v1/rest', RestController::class);
Route::apiResource('/v1/like', LikeController::class);