<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Etudiant>
 */
class EtudiantFactory extends Factory
{
  /**
   * Define the model's default state.
   *
   * @return array<string, mixed>
   */
  public function definition(): array
  {
    return [
      "nom" => fake()->name(),
      "prenom" => fake()->name(),
      "nom_ar" => "اسم عربي",
      "prenom_ar" => "اسم عربي",
      "code_massar" => fake()->unique()->text(10),
      "cin" => fake()->unique()->text(8),
      "lieu_naissance" => fake()->city(),
      "lieu_naissance_ar" => 'الرباط',
      "date_naissance" => fake()->date("Y-m-d"), //1988-06-20
      "pays" => fake()->country(),
      "province_naissance"  => fake()->numberBetween(1, 393),
      "sexe" =>  fake()->randomElement([0, 1]),
      "email" => fake()->unique()->safeEmail(),
      "password" => Hash::make('123456789'),
      "telephone" => 34287954,
      "situation_familiale" => fake()->randomElement(["c","m","d","v","a"]),
      "ville"  => fake()->numberBetween(1, 393),
      "adresse_perso1" => fake()->address(),
      "adresse_perso2" => fake()->address(),
      "adresse_perso3" => fake()->address(),
      "fonctionnaire" => fake()->randomElement([0, 1]),
      "photo"=>"L149055608_releve_note.pdf",

      'created_at' => now(),
    ];
  }
}
