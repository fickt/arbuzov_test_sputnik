<?php

use App\Http\Controllers\Auth\LoginAuthController;
use App\Http\Controllers\Auth\LogoutAuthController;
use App\Http\Controllers\Auth\RegisterAuthController;
use App\Http\Controllers\Resort\IndexResortController;
use App\Http\Controllers\Resort\ShowByUserIdResortController;
use App\Http\Controllers\Resort\ShowResortController;
use App\Http\Controllers\Resort\UpdateResortController;
use Illuminate\Support\Facades\Route;


/* Resorts */
Route::group(['middleware' => 'jwt.auth', 'prefix' => 'resorts'], function () {
    Route::get('', IndexResortController::class);
    Route::get('/myresorts', ShowResortController::class);
    Route::get('/users/{userId}', ShowByUserIdResortController::class);
    Route::patch('/{resortId}', UpdateResortController::class);

});

/* Authentication */
Route::group(['middleware' => 'api', 'prefix' => 'auth'], function () {
    Route::post('/register', RegisterAuthController::class);
    Route::post('/login', LoginAuthController::class);
    Route::post('/logout', LogoutAuthController::class);
});
