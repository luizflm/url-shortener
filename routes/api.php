<?php

use App\Http\Controllers\Api\v1\ShorteningController;
use Illuminate\Support\Facades\Route;

Route::prefix('api')->group(function () {
    Route::prefix('v1')->group(function () {
        Route::post('/shortenings', [ShorteningController::class, 'store']);
    });
});
