<?php

namespace Database\Seeders;

use App\Models\Dossier;
use App\Models\Etudiant;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EtudiantsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      Etudiant::factory()->count(300)->create()->each(function ($etudiant) {
        $etudiant->dossier()->save(Dossier::factory()->make());
    });
    }
}
