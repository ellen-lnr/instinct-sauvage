<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Database\Seeders\InstinctSauvageSeeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Utilisateur test existant
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        // ✅ Utilisateur admin ajouté manuellement
        User::create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('Password123!'), // mot de passe clair
        ]);

        // ✅ Histoire : Instinct Sauvage
        $this->call(InstinctSauvageSeeder::class);
    }
}
