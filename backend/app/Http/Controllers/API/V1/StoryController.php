<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Models\Story;

class StoryController extends Controller
{
    public function index()
    {
        return response()->json([
            'stories' => Story::all()
        ]);
    }

    public function show(Story $story)
    {
        return response()->json([
            'story' => $story->load('chapters', 'ends')
        ]);
    }
}
