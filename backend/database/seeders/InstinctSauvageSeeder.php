<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Chapter;
use App\Models\Choice;
use App\Models\End;

class InstinctSauvageSeeder extends Seeder
{
    public function run(): void
    {
        // Fin 1 : mort
        $end1 = End::create([
            'type' => 'mort',
            'description' => 'Tu as été blessé par un prédateur et n’as pas survécu.'
        ]);

        // Fin 2 : loup solitaire
        $end2 = End::create([
            'type' => 'loup_solitaire',
            'description' => 'Tu as choisi la solitude et survécu sans meute.'
        ]);

        // Fin 3 : alpha
        $end3 = End::create([
            'type' => 'alpha',
            'description' => 'Tu as formé ta propre meute et deviens un leader respecté.'
        ]);

        // Chapitre 1
        $chap1 = Chapter::create([
            'content' => "Tu es un jeune loup solitaire. Que fais-tu ?"
        ]);

        $chap2 = Chapter::create([
            'content' => "Tu t’enfonces dans la forêt et tu entends des bruits étranges."
        ]);

        $chap3 = Chapter::create([
            'content' => "Tu longes la rivière et découvres un poisson encore vivant."
        ]);

        $chap4 = Chapter::create([
            'content' => "Tu explores les bruits, et tu découvres un autre loup blessé."
        ]);

        $chap5 = Chapter::create([
            'content' => "Tu manges le poisson et te sens rassasié. Tu entends un hurlement au loin."
        ]);

        $chap6 = Chapter::create([
            'content' => "Tu aides le loup blessé, il te remercie et te propose de rejoindre sa future meute."
        ]);

        // Choices Chapitre 1
        Choice::create([
            'chapter_id' => $chap1->id,
            'text' => "Explorer la forêt",
            'next_chapter_id' => $chap2->id
        ]);

        Choice::create([
            'chapter_id' => $chap1->id,
            'text' => "Suivre la rivière",
            'next_chapter_id' => $chap3->id
        ]);

        // Choices Chapitre 2
        Choice::create([
            'chapter_id' => $chap2->id,
            'text' => "Fuir les bruits",
            'end_id' => $end1->id
        ]);

        Choice::create([
            'chapter_id' => $chap2->id,
            'text' => "Aller vers les bruits",
            'next_chapter_id' => $chap4->id
        ]);

        // Choices Chapitre 3
        Choice::create([
            'chapter_id' => $chap3->id,
            'text' => "Manger le poisson",
            'next_chapter_id' => $chap5->id
        ]);

        Choice::create([
            'chapter_id' => $chap3->id,
            'text' => "Laisser le poisson",
            'end_id' => $end2->id
        ]);

        // Choices Chapitre 4
        Choice::create([
            'chapter_id' => $chap4->id,
            'text' => "Ignorer le loup blessé",
            'end_id' => $end2->id
        ]);

        Choice::create([
            'chapter_id' => $chap4->id,
            'text' => "Aider le loup blessé",
            'next_chapter_id' => $chap6->id
        ]);

        // Choices Chapitre 5
        Choice::create([
            'chapter_id' => $chap5->id,
            'text' => "Suivre le hurlement",
            'end_id' => $end3->id
        ]);

        Choice::create([
            'chapter_id' => $chap5->id,
            'text' => "Faire demi-tour",
            'end_id' => $end2->id
        ]);

        // Chapitre 6
        Choice::create([
            'chapter_id' => $chap6->id,
            'text' => "Accepter l’invitation à rejoindre sa meute",
            'end_id' => $end3->id
        ]);
    }
}
