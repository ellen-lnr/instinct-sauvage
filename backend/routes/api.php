<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\V1\StoryController;
use App\Http\Controllers\ChapterController;
use App\Http\Controllers\ChoiceController;
use App\Http\Controllers\EndController;

Route::prefix('v1')->group(function () {
    // ✅ Test de l'API
    Route::get('/ping', function () {
        return response()->json(['message' => 'pong']);
    });

    // ✅ Routes pour les histoires (homepage)
    Route::get('/stories', [StoryController::class, 'index']);
    Route::get('/stories/{story}', [StoryController::class, 'show']);

    // ✅ Routes chapitres liés à une histoire
    Route::get('/stories/{story}/chapters/{chapter}', [ChapterController::class, 'show']);

    // ✅ Routes fins liées à une histoire
    Route::get('/stories/{story}/ends/{end}', [EndController::class, 'show']);

    // ✅ Ajout de choix
    Route::post('/choices', [ChoiceController::class, 'store']);
});
