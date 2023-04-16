<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEtudiantProfilRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
          //Informations personnelles
          "nom" => "required",
          "prenom" => "required",
          "nom_ar" => "required",
          "prenom_ar" => "required",
          "date_naissance" => "required",
          "lieu_naissance" => "required",
          "lieu_naissance_ar" => "required",
          "code_massar" => "required",
          "situation_familiale" => "required",
          "pays" => "required",
          "sexe" => "required",
          "telephone" => "required",
          "photo" => "required",
          "cin" => "required",
          "adresse_perso1" => "required",
          "adresse_perso2",
          "adresse_perso3",
          "ville" => "required",
          "email" => "required",
          "fonctionnaire" => "required",
          "province_naissance" => "required",
          //Informations du Baccalauréat
          "annee_obt_bac" => "required",
          "serie_bac" => "required",
          "province_bac" => "required",
          "moyenne_bac" => "required",
          "mention_bac" => "required",
          "bac" => "required",
          "academie" => "required",
          //Informations du diplôme (BAC+2)
          "annee_obt_diplome" => "required",
          "type_diplome" => "required",
          "etablissement" => "required",
          "mention_diplome" => "required",
          "specialite" => "required",
          "moyenne_diplome" => "required",
          "note_s1" => "required",
          "note_s2" => "required",
          "note_s3" => "required",
          "note_s4" => "required",
          "releve_annee_1" => "required",
          "releve_annee_2" => "required",
          "diplome" => "required",
          "cv" => "required",
        ];
      }
}
