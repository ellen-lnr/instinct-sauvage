<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChapterController;
use App\Http\Controllers\ChoiceController;
use App\Http\Controllers\EndController;

Route::prefix('v1')->group(function () {
    // Route de test pour vérifier que l'API fonctionne
    Route::get('/ping', function () {
        return response()->json(['message' => 'pong']);
    });

    // Routes pour l'histoire Instinct Sauvage
    Route::get('/chapters/{id}', [ChapterController::class, 'show']);
    Route::post('/choices', [ChoiceController::class, 'store']);
    Route::get('/ends', [EndController::class, 'index']);
    Route::get('/ends/{id}', [EndController::class, 'show']);
});
