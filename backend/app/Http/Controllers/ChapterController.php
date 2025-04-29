<?php

namespace App\Http\Controllers;

use App\Models\Chapter;
use Illuminate\Http\Request;

class ChapterController extends Controller
{
    public function show($id)
    {
        $chapter = Chapter::with('choices')->find($id);

        if (!$chapter) {
            return response()->json([
                'message' => 'Chapitre non trouvé.'
            ], 404);
        }

        return response()->json([
            'chapter' => $chapter
        ], 200);
    }
}
