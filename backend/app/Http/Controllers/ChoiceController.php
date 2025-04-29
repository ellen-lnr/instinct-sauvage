<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreChoiceRequest;
use App\Models\Choice;

class ChoiceController extends Controller
{
    public function store(StoreChoiceRequest $request)
    {
        $choice = Choice::create($request->validated());

        return response()->json([
            'message' => 'Choix créé avec succès.',
            'choice' => $choice
        ], 201);
    }
}
