<?php

namespace App\Http\Controllers;

use App\Models\Chapter;
use Illuminate\Http\Request;

class ChapterVisitController extends Controller
{
    /**
     * Enregistre un chapitre comme visité par l'utilisateur connecté.
     */
    public function store(Request $request, $id)
    {
        $user = $request->user();
        $chapter = Chapter::findOrFail($id);

        // On attache le chapitre si pas déjà visité
        $user->visitedChapters()->syncWithoutDetaching([$chapter->id]);

        return response()->json([
            'message' => 'Chapitre marqué comme visité.',
            'chapter_id' => $chapter->id,
        ]);
    }
}
