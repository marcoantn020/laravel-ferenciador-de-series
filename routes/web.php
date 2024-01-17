<?php

use App\Http\Controllers\EpisodesController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SeasonsController;
use App\Http\Controllers\SeriesController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/login', [LoginController::class, 'index'])
    ->name('login');

Route::post('/login', [LoginController::class, 'store'])
    ->name('login.store');

Route::get('/logout', [LoginController::class, 'logout'])
    ->name('logout')->middleware('authenticator');

Route::get('/users', [UserController::class, 'create'])
    ->name('users.create');

Route::post('/users', [UserController::class, 'store'])
    ->name('users.store');

Route::resource('/series', SeriesController::class)
    ->except(['show']);

Route::middleware('authenticator')->group(function () {
    Route::get('/', function () {
        return redirect()->route('series.index');
    });

    Route::get('/series/{series}/seasons', [SeasonsController::class, 'index'])
        ->name('seasons.index');

    Route::get('/season/{season}/episodes', [EpisodesController::class, 'index'])
        ->name('episodes.index');

    Route::put('/season/{season}/episodes', [EpisodesController::class, 'update'])
        ->name('episodes.update');
});


