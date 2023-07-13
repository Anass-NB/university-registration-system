<?php

namespace App\Http\Controllers;

use App\Exports\EtudiantsExport;
use App\Http\Requests\StoreEtudiantProfilRequest;
use App\Http\Traits\AttachFilesTrait;
use App\Models\Avis;
use App\Models\Dossier;
use App\Models\Etudiant;
use App\Models\Ville;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\Do_;
use Maatwebsite\Excel\Facades\Excel;

class EtudiantController extends Controller
{
  use AttachFilesTrait;

  /**
   * Display a listing of the resource.
   */

  public function index()
  {
    return view("pages.etudiants.dashboard");
  }

  public function avis()
  {
    $avis = Avis::all();
    return view("pages.etudiants.avis")->with([
      "avis" => $avis
    ]);
  }

  public function exportExcel()
  {
    return Excel::download(new EtudiantsExport, 'candidats.xlsx');
  }
  public function profile()
  {
    $villes = Ville::all();
    return view("pages.etudiants.profile")->with([
      "villes" => $villes,
    ]);
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    //
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(StoreEtudiantProfilRequest $request)
  {

    // return $request;
    // DB::beginTransaction();

    // try {
    // update in table student
    $student = Etudiant::findOrFail(auth()->user()->id);
    $dossier =  auth()->user()->dossier;
    $student->nom = $request->nom;
    $student->prenom = $request->prenom;
    $student->date_naissance = $request->date_naissance;
    $student->lieu_naissance = $request->lieu_naissance;
    $student->lieu_naissance_ar = $request->lieu_naissance_ar;
    $student->province_naissance = $request->province_naissance;
    $student->code_massar = $request->code_massar;
    $student->cin = $request->cin;
    $student->telephone =$request->telephone;
    $student->ville = $request->ville;
    $student->sexe = $request->sexe;
    $student->nom_ar = $request->nom_ar;
    $student->prenom_ar = $request->prenom_ar;
    $student->adresse_perso3 = $request->adresse_perso3;
    $student->adresse_perso2 = $request->adresse_perso2;
    $student->adresse_perso1 = $request->adresse_perso1;
    $student->situation_familiale = $request->situation_familiale;
    $student->pays = $request->pays;
    $student->email = auth()->user()->email;
    $student->fonctionnaire = $request->fonctionnaire;
    if ($request->hasFile('photo')) {
      $name = $this->uploadDocument($request,"photo","photo",$request->code_massar);
      $student->photo = $name;
    }
    $student->save();



    // insert in to Dosiier
    //bac
    $dossier->annee_obt_bac = $request->annee_obt_bac;
    $dossier->moyenne_bac = $request->moyenne_bac;
    $dossier->serie_bac = $request->serie_bac;
    $dossier->province_bac = $request->province_bac;
    $dossier->mention_bac = $request->mention_bac;
    $dossier->academie = $request->academie;
    if ($request->hasFile('bac_document')) {
      $name_bac = $this->uploadDocument($request,"bac_document","bac_document",$request->code_massar);
      $dossier->bac_document = $name_bac;
    }
    //bac +2
    $dossier->type_diplome = $request->type_diplome;
    $dossier->annee_obt_diplome = $request->annee_obt_diplome;
    $dossier->moyenne_diplome = $request->moyenne_diplome;
    $dossier->specialite_diplome = $request->specialite_diplome;
    $dossier->mention_diplome = $request->mention_diplome;
    $dossier->note_s1 = $request->note_s1;
    $dossier->note_s2 = $request->note_s2;
    $dossier->note_s3 = $request->note_s3;
    $dossier->note_s4 = $request->note_s4;
    $dossier->type_diplome = $request->type_diplome;
    $dossier->etablissement = $request->etablissement;
    if ($request->hasFile('releve_note')) {
      $name_rn = $this->uploadDocument($request,"releve_note","releve_note",$request->code_massar);
      $dossier->releve_note = $name_rn;
    }

    if ($request->hasFile('diplome_document')) {
      $name_diplome = $this->uploadDocument($request,"diplome_document","diplome_document",$request->code_massar);
      $dossier->diplome_document = $name_diplome;

    }
    if ($request->hasFile('cv')) {
      $name_cv = $this->uploadDocument($request,"cv","cv",$request->code_massar);
      $dossier->cv = $name_cv;

    }


    $dossier->save();


    // DB::commit();
    toastr()->success("Les données sont enregistrées avec succès");
    return redirect()->route("etudiant.profile");
    // } catch (\Exception $e) {
    //   // DB::rollback();
    //   return redirect()->back()->withErrors(['error' => $e->getMessage()]);
    // }
  }

  /**
   * Display the specified resource.
   */
  public function show(Etudiant $etudiant)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Etudiant $etudiant)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request)
  {
    //
    try {
      $etudiant = Etudiant::findOrFail($request->id);
      $etudiant->nom = $request->nom;
      $etudiant->prenom = $request->prenom;
      $etudiant->date_naissance = $request->date_naissance;
      $etudiant->lieu_naissance = $request->lieu_naissance;
      $etudiant->lieu_naissance_ar = $request->lieu_naissance_ar;
      $etudiant->province_naissance = $request->province_naissance;
      $etudiant->code_massar = $request->code_massar;
      $etudiant->cin = $request->cin;
      $etudiant->telephone = $request->telephone;
      $etudiant->ville = $request->ville;
      $etudiant->sexe = $request->sexe;
      $etudiant->nom_ar = $request->nom_ar;
      $etudiant->prenom_ar = $request->prenom_ar;
      $etudiant->adresse_perso3 = $request->adresse_perso3;
      $etudiant->adresse_perso2 = $request->adresse_perso2;
      $etudiant->adresse_perso1 = $request->adresse_perso1;
      $etudiant->situation_familiale = $request->situation_familiale;
      $etudiant->pays = $request->pays;
      $etudiant->email = $request->email;
      $etudiant->fonctionnaire = $request->fonctionnaire;
      $etudiant->description = $request->description;
      $etudiant->save();
      toastr()->success('Les données sont enregistrées avec succès !');
      return redirect()->route("etudiants.list");
    } catch (\Throwable $th) {
      return redirect()->back()->withErrors(['error' => $th->getMessage()]);
    }
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Request $request)
  {

    $etudiant = Etudiant::findOrFail($request->etudiant_id);
    $etudiant->delete();
    toastr()->error('L\'etudiant a été bien supprimé !', " ");
    return redirect()->route("etudiant.list");
  }


  public function tousEtudiants()
  {
    $villes = Ville::all();
    return view("pages.admin.etudiants.index")->with([
      "etudiants" => Etudiant::paginate(20),
      "villes" => $villes,
    ]);
  }
}
