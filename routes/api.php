<?php

use App\Http\Controllers\Api\AuthApiController;
use App\Http\Controllers\Api\EpisodesApiController;
use App\Http\Controllers\Api\SeasonsApiController;
use App\Http\Controllers\Api\SeriesApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('v1/login', [AuthApiController::class, 'index']);

Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('/v1/series',SeriesApiController::class);
    Route::get('/v1/series/{series}/seasons', [SeasonsApiController::class, 'index']);
    Route::get('/v1/series/{series}/episodes', [EpisodesApiController::class, 'index']);
    Route::patch('/v1/episodes/{episode}', [EpisodesApiController::class, 'show']);

    Route::get('v1/logout', [AuthApiController::class, 'logout']);
});


