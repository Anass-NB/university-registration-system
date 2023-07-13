<?php

namespace Database\Seeders;

use App\Models\Candidature;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CandidaturesTablesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      for ($i=250; $i < 300; $i++) {
        Candidature::create([
          "etudiant_id" => $i,
          "formation_id" => 1,
          "created_at" =>date("2023-07-08 17:40:30"),
        ]);
      }

    }
}
