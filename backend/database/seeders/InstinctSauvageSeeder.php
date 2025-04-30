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
        // Fins possibles
        $end1 = End::create([
            'type' => 'mort',
            'description' => 'Ton instinct t’a trahi. Dans un dernier souffle, tu te fonds dans l’ombre de la forêt éternelle.'
        ]);

        $end2 = End::create([
            'type' => 'loup_solitaire',
            'description' => 'Seul mais libre, tu arpentes les étendues sauvages, survivant avec courage mais sans attache.'
        ]);

        $end3 = End::create([
            'type' => 'alpha',
            'description' => 'Ton charisme et ta bravoure t’ont permis de rassembler une meute fidèle. Tu régneras désormais comme Alpha.'
        ]);

        // Chapitre 1
        $chap1 = Chapter::create([
            'content' => "Le vent glacial soulève les feuilles mortes alors que tu émerges prudemment d'une anfractuosité rocheuse. Privé de ta meute, ton regard fouille les ombres mouvantes d'une forêt immense. Ton estomac crie famine et ton instinct te somme de choisir ta voie : plonger dans l'obscurité dense des bois ou longer la rivière argentée scintillant sous la lumière pâle du matin."
        ]);

        $chap2 = Chapter::create([
            'content' => "L'épaisseur de la forêt t'enveloppe rapidement, réduisant les sons à de simples échos étouffés. Au détour d'un sentier, des bruissements anormaux troublent ton avancée. Est-ce un ami, ou un piège tendu par un prédateur ?"
        ]);

        $chap3 = Chapter::create([
            'content' => "Les galets humides de la rivière glissent sous tes pattes. L'eau claire te révèle la silhouette d'un poisson frétillant désespérément. Ta faim crie vengeance, mais ton odorat capte aussi des traces fraîches de danger alentour."
        ]);

        $chap4 = Chapter::create([
            'content' => "En t'approchant prudemment des bruits, ton museau rencontre celui d'un loup blessé. Son regard mêle détresse et défiance. T'approcheras-tu pour l'aider, ou le laisseras-tu affronter seul son destin ?"
        ]);

        $chap5 = Chapter::create([
            'content' => "Après avoir apaisé ta faim, un hurlement perçant fend le silence. Quelque part, des frères ou des ennemis t'appellent. Ta réponse pourrait sceller ton avenir."
        ]);

        $chap6 = Chapter::create([
            'content' => "Ton acte de compassion t'a lié à un nouvel allié. Ensemble, vos chants solitaires vibrent bientôt à travers les collines, appelant d'autres âmes perdues à se joindre à votre future meute."
        ]);

        // Choices Chapitre 1
        Choice::create([
            'chapter_id' => $chap1->id,
            'text' => "T'aventurer sans hésitation sous la voûte sombre de la forêt",
            'next_chapter_id' => $chap2->id
        ]);

        Choice::create([
            'chapter_id' => $chap1->id,
            'text' => "Te fier à l'eau claire et suivre le murmure de la rivière",
            'next_chapter_id' => $chap3->id
        ]);

        // Choices Chapitre 2
        Choice::create([
            'chapter_id' => $chap2->id,
            'text' => "Tourner les talons, laissant derrière toi le mystère et le danger",
            'end_id' => $end1->id
        ]);

        Choice::create([
            'chapter_id' => $chap2->id,
            'text' => "Approcher prudemment les sons inquiétants pour en découvrir l'origine",
            'next_chapter_id' => $chap4->id
        ]);

        // Choices Chapitre 3
        Choice::create([
            'chapter_id' => $chap3->id,
            'text' => "Ignorer les signes de danger pour calmer ta faim immédiate",
            'next_chapter_id' => $chap5->id
        ]);

        Choice::create([
            'chapter_id' => $chap3->id,
            'text' => "Résister à l'appât facile et avancer avec prudence",
            'end_id' => $end2->id
        ]);

        // Choices Chapitre 4
        Choice::create([
            'chapter_id' => $chap4->id,
            'text' => "Tourner la tête, laissant le loup blessé à son destin",
            'end_id' => $end2->id
        ]);

        Choice::create([
            'chapter_id' => $chap4->id,
            'text' => "T'approcher malgré le risque et lui offrir ton aide",
            'next_chapter_id' => $chap6->id
        ]);

        // Choices Chapitre 5
        Choice::create([
            'chapter_id' => $chap5->id,
            'text' => "Répondre à l'appel sauvage en suivant le hurlement lointain",
            'end_id' => $end3->id
        ]);

        Choice::create([
            'chapter_id' => $chap5->id,
            'text' => "Écouter ton instinct de survie et rebrousser chemin discrètement",
            'end_id' => $end2->id
        ]);

        // Chapitre 6
        Choice::create([
            'chapter_id' => $chap6->id,
            'text' => "Accepter avec fierté de fonder une nouvelle famille sauvage",
            'end_id' => $end3->id
        ]);
    }
}
