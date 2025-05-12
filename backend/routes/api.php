<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\ChapterController;
use App\Http\Controllers\ChoiceController;
use App\Http\Controllers\EndController;
use App\Http\Controllers\API\V1\StoryController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\ChapterVisitController;

// ✅ Routes publiques versionnées
Route::prefix('v1')->group(function () {
    Route::get('/chapters/{id}', [ChapterController::class, 'show']);
    Route::get('/ends', [EndController::class, 'index']);
    Route::get('/ends/{id}', [EndController::class, 'show']);
    Route::get('/stories', [StoryController::class, 'index']);

    // ✅ Ajout : marquer un chapitre comme visité (auth required)
    Route::middleware('auth:sanctum')->post('/chapters/{id}/visit', [ChapterVisitController::class, 'store']);

    // ✅ Ajout : progression utilisateur
    Route::middleware('auth:sanctum')->get('/progress', function () {
        $user = request()->user();
        $visited = $user->visitedChapters()->count();
        $total = \App\Models\Chapter::count();
    
        $adjusted = max(1, $total - 1); // éviter /0
        $progress = max(0, round((($visited - 1) / $adjusted) * 100));
    
        return response()->json(['progress' => $progress]);
    });
    
});

// ✅ Auth Sanctum : récupérer l'utilisateur connecté
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// ✅ Routes pour l'authentification (avec CSRF + cookies)
Route::post('/register', [RegisteredUserController::class, 'store']);
Route::post('/login', [AuthenticatedSessionController::class, 'store']);
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy']);
