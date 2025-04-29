<?php

namespace App\Http\Controllers;

use App\Models\End;
use Illuminate\Http\Request;

class EndController extends Controller
{
    public function index()
    {
        $ends = End::all();

        return response()->json([
            'ends' => $ends
        ], 200);
    }

    public function show($id)
    {
        $end = End::find($id);

        if (!$end) {
            return response()->json([
                'message' => 'Fin non trouvée.'
            ], 404);
        }

        return response()->json([
            'end' => $end
        ], 200);
    }
}
