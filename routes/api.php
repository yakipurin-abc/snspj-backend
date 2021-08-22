<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RestController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\UserController;

Route::apiResource('/v1/rest', RestController::class);
Route::apiResource('/v1/like', LikeController::class);
Route::apiResource('/v1/comment', CommentController::class);
Route::apiResource('/v1/user', UserController::class);
