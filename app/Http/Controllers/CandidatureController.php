<?php

namespace App\Http\Controllers;

use App\Exports\EtudiantsExport;
use App\Models\Candidature;
use App\Models\Enseignant;
use App\Models\Region;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\Console\Input\Input;

class CandidatureController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {

    return view("pages.etudiants.candidatures")->with([]);
  }


  private function getFiltredCandidatures(Request $request){
    $query = Candidature::with('etudiant')
      ->whereHas('formation', function ($query) {
        $query->where('enseignant_id', auth()->id());
      });

    if ($request->has('annee_bac') && $request->get('annee_bac') != "") {
      $annee_bac = $request->get('annee_bac');
      $query->whereHas('etudiant', function ($query) use ($annee_bac) {
        $query->whereHas('dossier', function ($query) use ($annee_bac) {
          $query->where('annee_obt_bac', $annee_bac);
        });
      });
    }
    if ($request->has('annee_diplome') && $request->get('annee_diplome') != "") {
      $annee_diplome = $request->get('annee_diplome');
      $query->whereHas('etudiant', function ($query) use ($annee_diplome) {
        $query->whereHas('dossier', function ($query) use ($annee_diplome) {
          $query->where('annee_obt_diplome', $annee_diplome);
        });
      });
    }

    if ($request->has('serie_bac') && $request->get('serie_bac') != "") {
      $serie_bac = $request->get('serie_bac');
      $query->whereHas('etudiant', function ($query) use ($serie_bac) {
        $query->whereHas('dossier', function ($query) use ($serie_bac) {
          $query->where('serie_bac', $serie_bac);
        });
      });
    }
    if ($request->has('moyenne_bac') && $request->get('moyenne_bac') != "") {
      $moyenne_bac = $request->get('moyenne_bac');
      $query->whereHas('etudiant', function ($query) use ($moyenne_bac) {
        $query->whereHas('dossier', function ($query) use ($moyenne_bac) {
          $query->where('moyenne_bac', ">=", $moyenne_bac);
        });
      });
    }
    if ($request->has('mention_diplome') && $request->get('mention_diplome') != "") {
      $mention_diplome = $request->get('mention_diplome');
      $query->whereHas('etudiant', function ($query) use ($mention_diplome) {
        $query->whereHas('dossier', function ($query) use ($mention_diplome) {
          $query->where('mention_diplome', "=", $mention_diplome);
        });
      });
    }

    if ($request->has('region') && $request->get('region') != "") {
      $region = $request->get('region');
      $query->whereHas('etudiant', function ($query) use ($region) {
        $query->whereHas('ville_etudiant', function ($query) use ($region) {
          $query->where('region_id', $region);
        });
      });
    }



    $candidatures = $query->get();
    return $candidatures;
  }


  public function candidatures(Request $request)
  {
    return view("pages.enseignants.candidatures.index")->with([
      "candidatures" => $this->getFiltredCandidatures($request),
      "regions" => Region::all(),

    ]);
  }


  public function exportExcel(Request $request)
  {
    return Excel::download(new EtudiantsExport($this->getFiltredCandidatures($request)), 'reslutats.xlsx');
  }

  public function candidaturesParRegion()
  {
    $candidaturesParRegion = DB::table('candidatures')
      ->join('etudiants', 'candidatures.etudiant_id', '=', 'etudiants.id')
      ->join('villes', 'etudiants.ville', '=', 'villes.id')
      ->join('regions', 'villes.region_id', '=', 'regions.id')
      ->select('regions.nom AS region', DB::raw('count(*) as total'))
      ->groupBy('region')
      ->orderBy('total', 'desc')
      ->get();
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create(Request $request)
  {
    $exist = Candidature::where("etudiant_id",auth()->id())
    ->where("formation_id",$request->formation_id)->first();
    if(!$exist){
      $candidature = new Candidature();
      $candidature->etudiant_id = auth()->id();
      $candidature->formation_id = $request->formation_id;
      $candidature->save();
      return redirect()->route("etudiant.dashboard");
    }
    else{
      return redirect()->route("candidatures.list");
    }
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    //
  }

  /**
   * Display the specified resource.
   */
  public function show(Request $request)
  {
    $candidature =  Candidature::findOrFail($request->candidature_id);
    // Download the PDF
    return view("pages.etudiants.candidature_details")->with([
      "candidature" => $candidature,
    ]);
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Candidature $candidature)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, Candidature $candidature)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Request $request)
  {
    // return $request;
    $candidature = Candidature::findOrFail($request->candidature_id);
    $candidature->delete();
    toastr()->error(' La candidature a été bien supprimé !', " ");
    return redirect()->route("etudiant.candidature");
  }
}
