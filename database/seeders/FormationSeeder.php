<?php

namespace Database\Seeders;

use App\Models\Formation;
use App\Models\Enseignant;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class FormationSeeder extends Seeder
{
    public function run(): void
    {
        // Get all enseignant IDs
        $enseignantIds = Enseignant::pluck('id')->toArray();

        // Create sample formations
        $formations = [
            [
                'nom' => 'Développement Web Full Stack',
                'description' => 'Formation complète en développement web incluant frontend et backend',
                'duree' => 1,
                'enseignant_id' => fake()->randomElement($enseignantIds),
            ],
            [
                'nom' => 'Intelligence Artificielle',
                'description' => 'Introduction aux concepts fondamentaux de l\'IA et du Machine Learning',
                'duree' => 2,
                'enseignant_id' => fake()->randomElement($enseignantIds),
            ],
            [
                'nom' => 'Cybersécurité',
                'description' => 'Formation approfondie sur la sécurité informatique et la protection des données',
                'duree' => 2,
                'enseignant_id' => fake()->randomElement($enseignantIds),
            ],
            [
                'nom' => 'DevOps et Cloud Computing',
                'description' => 'Maîtrisez les outils et pratiques DevOps modernes',
                'duree' => 1,
                'enseignant_id' => fake()->randomElement($enseignantIds),
            ],
            [
                'nom' => 'Data Science',
                'description' => 'Analyse de données et visualisation avec Python',
                'duree' => 2,
                'enseignant_id' => fake()->randomElement($enseignantIds),
            ],
        ];

        foreach ($formations as $formation) {
            Formation::create([
                'nom' => $formation['nom'],
                'slug' => Str::slug($formation['nom']),
                'description' => $formation['description'],
                'duree' => $formation['duree'],
                'enseignant_id' => $formation['enseignant_id'],
            ]);
        }

        
    }
}
