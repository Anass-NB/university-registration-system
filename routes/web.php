<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\AvisController;
use App\Http\Controllers\CandidatureController;
use App\Http\Controllers\EnseignantController;
use App\Http\Controllers\EtudiantController;
use App\Http\Controllers\FormationController;
use App\Http\Controllers\LocalController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Models\Candidature;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
  return view('pages.frontend.index');
});
Route::get('/forget', function () {
  return view('auth.forgot-password');
});


//! Etudiants routes

//?Authentification
Route::view("/etudiant/login", "auth.login_etudiant")->name("etudiant.loginForm")->middleware("guest");
Route::view("/etudiant/register", "auth.register_etudiant")->name("etudiant.registerForm")->middleware("guest");
Route::post("/etudiant/login", [LoginController::class, "login"])->name("login.etudiant");
Route::post("/etudiant/register", [LoginController::class, "register"])->name("etudiant.register");


Route::middleware('auth:etudiant')->group(function () {
  Route::get("/etudiant/dashboard", [EtudiantController::class, "index"])->name("etudiant.dashboard");
  Route::get("/etudiant/profile", [EtudiantController::class, "profile"])->name("etudiant.profile");
  Route::post("/etudiant/save", [EtudiantController::class, "store"])->name("etudiant.store");
  Route::post("/document/delete", [EtudiantController::class, "deleteFile"])->name("document.delete");
  Route::get("/avisLicencesPro", [EtudiantController::class, "avis"])->name("avislicencespro");
  Route::get("/formation/{slug}", [FormationController::class, "formationDetails"])->name("formation.details");
  Route::post("/postuler", [CandidatureController::class, "create"])->middleware("profile.complete")->name("candidature.create");


  //? Les candidatures
  Route::get("mes-candidatures", [CandidatureController::class, "index"])->name("etudiant.candidature");

  Route::post("candidatures/details", [CandidatureController::class, "show"])->name("etudiant.candidaturedetails");
  Route::post("candidatures/delete", [CandidatureController::class, "destroy"])->name("etudiant.candidaturedelete");

});







//! Enseignants routes


Route::middleware('auth:enseignant')->group(function () {
  Route::get("/enseignant/dashboard", [EnseignantController::class, "index"])->name("enseignant.dashboard");
  Route::get("/tous-candidatures-estfbs", [CandidatureController::class, "candidatures"])->name("candidatures.list");
  Route::post("/export-excel", [CandidatureController::class, "exportExcel"])->name("export.excel");
  // Route::get("/filtrer-resultats",[CandidatureController::class,"filtrer"])->name("candidatures.filter");
});

Route::view("/test", "test");
Route::view("/blank", "blank");









//! Admin routes
Route::middleware('auth:web')->group(function () {
  Route::get("/dashboard", [UserController::class, "index"])->name("dashboard");
  //? enseignant controle
  Route::get("/enseignants", [EnseignantController::class, "tousEnseignants"])->name("enseignants.index");
  Route::get("/ajouter-enseignant", [EnseignantController::class, "create"])->name("enseignant.create");
  Route::post("/save-enseignant", [EnseignantController::class, "store"])->name("enseignant.store");
  Route::post('/supprimer-enseignant', [EnseignantController::class, 'destroy'])->name('enseignant.delete');
  Route::post('/updateenseign', [EnseignantController::class, 'update'])->name('enseignant.update');

  //? formation routes
  Route::get("/formations", [FormationController::class, "index"])->name("formations.index");
  Route::get("/ajouter-formation", [FormationController::class, "create"])->name("formation.create");
  Route::post("/sauvgarder-formation", [FormationController::class, "store"])->name("formation.store");
  Route::get('/editer-formation/{id}', [FormationController::class, 'edit'])->name('formation.edit');
  Route::post('/update-formation', [FormationController::class, 'update'])->name('formation.update');
  Route::post('/supprimer-formation', [FormationController::class, 'destroy'])->name('formation.delete');
  //? Gestion avis
  Route::get("/avis-precandidature", [AvisController::class, "index"])->name("avis.index");
  Route::get("/ajouter-avis", [AvisController::class, "create"])->name("avis.create");
  Route::post("/sauvgarder-avis", [AvisController::class, "store"])->name("avis.store");
  Route::post('/supprimer-avis', [AvisController::class, 'destroy'])->name('avis.delete');
  //? Etudiant controle
  Route::get("/tous-etudiants", [EtudiantController::class, "tousEtudiants"])->name("etudiant.list");
  Route::post('/supprimer-etudiant', [EtudiantController::class, 'destroy'])->name('etudiant.delete');
  Route::post('/update-etudiant', [EtudiantController::class, 'update'])->name('etudiant.update');
  //? Gestion des locaux
  Route::get('/gestion-locaux', [LocalController::class, 'index'])->name('locaux.index');
  Route::post('/gestion-locaux', [LocalController::class, 'store'])->name('locaux.store');
  //? Notifications SMS
  Route::get("notifications",[NotificationController::class,"index"])->name("notifications.index");
  Route::post("notifications",[NotificationController::class,"store"])->name("notifications.store");
});




//Commun routes
Route::view("/selection", "auth.selection")->name("selection")->middleware("guest");
Route::view("/estfbs/login", "auth.usms-login")->name("usms.loginForm")->middleware("guest");
Route::post("/estfbs/login", [LoginController::class, "login"])->name("login.usms");
Route::get('/logout', [LoginController::class, "logout"])->name('logout');




// Route::middleware(['auth:etudiant'])->group(function () {
//   Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//   Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//   Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

// require __DIR__.'/auth.php';
