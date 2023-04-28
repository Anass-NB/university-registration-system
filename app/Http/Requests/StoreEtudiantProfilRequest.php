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
    $userHasPhoto = !empty(auth()->user()->photo);
    $userHasBac = !empty(auth()->user()->dossier->bac_document);
    $userHasDiplome = !empty(auth()->user()->dossier->diplome_document);
    $userHasReleve = !empty(auth()->user()->dossier->releve_note);
    $userHasCv = !empty(auth()->user()->dossier->cv);

    $rules =  [
      //Informations personnelles
      "nom" => "required|string",
      "prenom" => "required|string",
      "nom_ar" => "required|string|regex:/\p{Arabic}/u",
      "prenom_ar" => "required|string|regex:/\p{Arabic}/u",
      "code_massar" => "required",
      "cin" => "required",
      "lieu_naissance" => "required",
      "lieu_naissance_ar" => "required|regex:/\p{Arabic}/u",
      "date_naissance" => "required",
      "province_naissance" => "required",
      "pays" => "required",
      "sexe" => "required",
      "telephone" => "required|numeric",
      "email" => "required|email|unique:etudiants,email," . auth()->id(),

      "situation_familiale" => "required",
      "ville" => "required",


      "adresse_perso1" => "required",
      "adresse_perso2",
      "adresse_perso3",
      "fonctionnaire" => "required",

      //Informations du Baccalauréat
      "annee_obt_bac" => "required",
      "serie_bac" => "required",
      "moyenne_bac" => "required|numeric|max:20",
      "mention_bac" => "required",
      "province_bac" => "required",
      // "bac_document" => "required",
      "academie" => "required",
      //Informations du diplôme (BAC+2)
      "annee_obt_diplome" => "required",
      "type_diplome" => "required",
      "moyenne_diplome" => "required|numeric|max:20",
      "mention_diplome" => "required",
      "specialite_diplome" => "required",
      "etablissement" => "required",
      "note_s1" => "required|numeric|max:20",
      "note_s2" => "required|numeric|max:20",
      "note_s3" => "required|numeric|max:20",
      "note_s4" => "required|numeric|max:20",
      // "releve_note" => "required",
      // "diplome_document" => "required",
      // "cv" => "required",
    ];


    // Only require the profile_picture field if the user doesn't have a profile picture
    if (!$userHasPhoto) {
      $rules['photo'] = 'required|image|mimes:jpeg,png,jpg,gif|max:200';
    } else {
      $rules['photo'] = 'nullable|image|mimes:jpeg,png,jpg,gif|max:200';
    }
    if (!$userHasBac) {
      $rules['bac_document'] = 'required|file|mimes:pdf|max:700';
    } else {
      $rules['bac_document'] = 'nullable|file|mimes:pdf|max:700';
    }
    if (!$userHasDiplome) {
      $rules['diplome_document'] = 'required|file|mimes:pdf|max:700';
    } else {
      $rules['diplome_document'] = 'nullable|file|mimes:pdf|max:700';
    }
    if (!$userHasReleve) {
      $rules['releve_note'] = 'required|file|mimes:pdf|max:700';
    } else {
      $rules['releve_note'] = 'nullable|file|mimes:pdf|max:700';
    }
    if (!$userHasCv) {
      $rules['cv'] = 'required|image|file|mimes:pdf|max:700';
    } else {
      $rules['cv'] = 'nullable|file|mimes:pdf|max:700';
    }


    return $rules;
  }
}
