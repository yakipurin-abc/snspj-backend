<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RestController;

Route::apiResource('/v1/rest', RestController::class);
