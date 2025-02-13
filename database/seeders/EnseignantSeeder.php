<?php

namespace Database\Seeders;

use App\Models\Enseignant;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class EnseignantSeeder extends Seeder
{
    public function run(): void
    {
        // Create sample enseignants
        $enseignants = [
            [
                'nom' => 'Ait Daoud',
                'prenom' => 'Rachid',
                'email' => 'rachid.ait@usms.test',
                'telephone' => '0612345678',
                'date_naissance' => '1980-01-01',
                'cin' => 'AB123456',
                'adresse' => '123 Rue Example',
                'ville' => 'Casablanca',
                'nationalite' => 'Marocaine',
                'password' => Hash::make('password'),
                'matricule' => 'ENS001',
                'email_verified_at' => now(),
                'remember_token' => \Str::random(10),
            ],
            [
                'nom' => 'Martin',
                'prenom' => 'Marie',
                'email' => 'marie.martin@education.com',
                'telephone' => '0623456789',
                'date_naissance' => '1985-05-15',
                'cin' => 'CD789012',
                'adresse' => '456 Avenue Example',
                'ville' => 'Fquih Ben Salah',
                'nationalite' => 'Marocaine',
                'password' => Hash::make('password'),
                'matricule' => 'ENS002',
                'email_verified_at' => now(),
                'remember_token' => \Str::random(10),
            ],
        ];

        foreach ($enseignants as $enseignant) {
            Enseignant::create($enseignant);
        }

    }
}
