<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Dossier>
 */
class DossierFactory extends Factory
{
  /**
   * Define the model's default state.
   *
   * @return array<string, mixed>
   */
  public function definition(): array
  {
    return [
      "annee_obt_bac" => fake()->numberBetween(2018, 2022),
      "serie_bac"  => fake()->randomElement(["sma","smb","pc","svt","autre"]),
      "moyenne_bac" => fake()->randomFloat(2,0,20),
      "mention_bac" => fake()->randomElement([1,2,3,4]),
      "province_bac" => fake()->numberBetween(1, 393),
      "bac_document" => "L149055608_releve_note.pdf",
      "academie" => fake()->city(),
      //Informations du diplôme (BAC+2)
      "annee_obt_diplome" => fake()->numberBetween(2020, 2022),
      "type_diplome" => fake()->text(20),
      "moyenne_diplome" => fake()->randomFloat(2,0,20),
      "mention_diplome" =>  fake()->randomElement([1,2,3,4]),
      "specialite_diplome" =>  fake()->text(20),
      "etablissement" => fake()->city(),
      "note_s1" =>  fake()->randomFloat(2,0,20),
      "note_s2" =>  fake()->randomFloat(2,0,20),
      "note_s3" =>  fake()->randomFloat(2,0,20),
      "note_s4" =>  fake()->randomFloat(2,0,20),
      "releve_note" => "L149055608_releve_note.pdf",
      "diplome_document" => "L149055608_releve_note.pdf",
      "cv" => "L149055608_releve_note.pdf",
    ];
  }
}
