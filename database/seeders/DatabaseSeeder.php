<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
  /**
   * Seed the application's database.
   */
  public function run(): void
  {
    // \App\Models\User::factory(2)->create();


    // \App\Models\Etudiant::factory()->create([
    //   'name' => 'Anass Nabil',
    //   'email' => 'anass@etudiant.com',
    //   'password' => Hash::make('anass@etudiant.com'),
    //   "code_massar" => "L1294243",
    // ]);

    $this->call([
      RegionSeeder::class,
      VilleSeeder::class,
      UserSeeder::class,
      EnseignantSeeder::class,
      FormationSeeder::class,
      EtudiantsTableSeeder::class,
      CandidaturesTablesSeeder::class
    ]);
  }
}
