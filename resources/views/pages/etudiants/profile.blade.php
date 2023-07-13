@extends('layouts.admin_layout')

@section('title')
  {{ auth()->user()->nom }} | Profile
@endsection
@section('sidebar')
  @include('pages.etudiants.sidebar')
@endsection
@section('header')
  @include('pages.etudiants.header')
@endsection
@section('styles')
  <style>
    .form-control {
      border: 1px solid #009efb;
    }
  </style>
@endsection

@section('content')
  {{-- Contennt --}}
  {{-- @include('layouts.content') --}}
  <!-- Page Header -->
  <div class="page-header">
    <div class="row">
      <div class="col-sm-12">
        <h3 class="page-title">Bonjour {{ auth()->user()->nom }} {{ auth()->user()->prenom }}!</h3>
        <ul class="breadcrumb">
          <li class="breadcrumb-item active">Dashboard (Candidat)</li>
          <br>

        </ul>
      </div>
    </div>
  </div>
  <!-- /Page Header -->

  {{-- PROFILE --}}

  <div class="col-12">



    <div class="card">
      <div class="card-body">
        {{-- @if (Session::has('error'))
        <li class="alert aler-danger">{{ Session::get('error') }}</li>
      @endif --}}
        @if ($errors->any())
          <div class="alert alert-danger">
            <ul>
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        @endif

        @if (Session::has('errorCompleteProfile'))
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <a href="#profile-section" class="alert-link">{{ Session::get('errorCompleteProfile') }}</a>
            <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
        @endif




        <div style="display: flex">
          <p style="margin-right: 20px">Achèvement du profil : </p>
          <div class="col-md-6">
            <div class="my-2 progress progress-md">
              <div class="progress-bar bg-{{ auth()->user()->profileCompletionColor() }}" role="progressbar"
                style="width: {{ auth()->user()->profileCompletionPercentage() }}%" aria-valuenow="75" aria-valuemin="0"
                aria-valuemax="100"></div>
            </div>
            <div>
              {{ auth()->user()->profileCompletionPercentage() }}%
            </div>
          </div>
        </div>
        <hr>
        <!-- Profile Settings Form -->
        <form action="{{ route('etudiant.store') }}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="row form-row">

            {{-- Row 1 --}}
            <div id="profile-section" class="comp-header mb-2">
              <h3 class="comp-title">Informations personnelles</h3>
              <div class="line"></div>
            </div>
            <div class="col-12 col-md-6 col-xl-2">
              <div class="form-group">
                <label>Nom</label>
                <input type="text" class="form-control @error('nom') is-invalid @enderror" name="nom"
                  value="{{ old('nom', auth()->user()->nom) }}">
                @error('nom')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
              </div>
            </div>
            <div class="col-12 col-md-6 col-xl-2">
              <div class="form-group">
                <label>Prenom</label>
                <input required type="text" class="form-control @error('prenom') is-invalid @enderror" name="prenom"
                  value="{{ old('prenom', auth()->user()->prenom) }}">
                @error('prenom')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
              </div>
            </div>
            <div class="col-12 col-md-6 col-xl-2">
              <div class="form-group">
                <label>الاسم العائلي</label>
                <input required type="text" class="form-control @error('nom_ar') is-invalid @enderror" name="nom_ar"
                  value="{{ old('nom_ar', auth()->user()->nom_ar) }}">
                @error('nom_ar')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
              </div>
            </div>
            <div class="col-12 col-md-6 col-xl-2">
              <div class="form-group">
                <label>الاسم الشخصي</label>
                <input required type="text" class="form-control @error('prenom_ar') is-invalid @enderror"
                  name="prenom_ar" value="{{ old('prenom_ar', auth()->user()->prenom_ar) }}">
                @error('prenom_ar')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
              </div>
            </div>
            <div class="col-12 col-md-6 col-xl-2">
              <div class="form-group">
                <label>Code Massar (C.N.E) </label>
                <input required type="text" class="form-control @error('code_massar') is-invalid @enderror"
                  name="code_massar" value="{{ old('code_massar', auth()->user()->code_massar) }}">
                @error('code_massar')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
              </div>
            </div>
            <div class="col-12 col-md-6 col-xl-2">
              <div class="form-group">
                <label>C.I.N بطاقة التعريف الشخصية</label>
                <input required type="text" class="form-control @error('cin') is-invalid @enderror" name="cin"
                  value="{{ old('cin', auth()->user()->cin) }}">
                @error('cin')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
              </div>
            </div>


            {{-- ROW 2 --}}
            <div class="col-12 col-md-6 col-xl-2">
              <div class="form-group">
                <label>Lieu de naissance </label>
                <input required type="text" class="form-control @error('lieu_naissance') is-invalid @enderror"
                  name="lieu_naissance" value="{{ old('lieu_naissance', auth()->user()->lieu_naissance) }}">
                @error('lieu_naissance')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
              </div>
            </div>
            <div class="col-12 col-md-6 col-xl-2">
              <div class="form-group">
                <label>مكان الازدياد </label>
                <input required type="text" class="form-control @error('lieu_naissance_ar') is-invalid @enderror"
                  name="lieu_naissance_ar" value="{{ old('lieu_naissance_ar', auth()->user()->lieu_naissance_ar) }}">
                @error('lieu_naissance_ar')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
              </div>
            </div>
            <div class="col-12 col-md-6 col-xl-2">
              <div class="form-group">
                <label>Pays</label>
                <input type="text" class="form-control @error('pays') is-invalid @enderror" name="pays"
                  value="{{ old('pays', auth()->user()->pays) }}">
                @error('pays')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
              </div>
            </div>
            <div class="col-12 col-md-6 col-xl-2">
              <div class="form-group">
                <label>Date naissance</label>
                @if (auth()->user()->date_naissance != null)
                  <input required type="date" class="form-control @error('date_naissance') is-invalid @enderror"
                    name="date_naissance" value="{{ old('date_naissance', auth()->user()->date_naissance) }}">
                @else
                  <input required type="date" value="{{ old('date_naissance') }}"
                    class="form-control @error('date_naissance') is-invalid @enderror " name="date_naissance">
                @endif
                @error('date_naissance')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
              </div>
            </div>

            <div class="col-12 col-md-6 col-xl-2">
              <div class="form-group">

                <label>Province de naissance </label>
                <select class="form-control @error('province_naissance') is-invalid @enderror"
                  name="province_naissance">
                  <option disabled selected>Changer Ville</option>
                  @foreach ($villes as $ville)
                    <option
                      {{ auth()->user()->province_naissance == $ville->id || old('province_naissance') == $ville->id ? 'selected' : '' }}
                      value="{{ $ville->id }}">{{ $ville->nom }}</option>
                  @endforeach
                  @error('province_naissance')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror

                </select>
              </div>
            </div>


            {{-- <div class="col-12 col-md-6 col-xl-2">
              <div class="form-group">
                <label>Province de naissance </label>
                <select required class="form-control @error('nom') is-invalid @enderror" name="province_naissance">

                  @if (auth()->user()->province_naissance != null)
                    <option value="{{ auth()->user()->province_naissance }}" selected>
                      {{ auth()->user()->province_naissance }}
                    </option>
                  @else
                    <option disabled selected>Changer Ville</option>
                  @endif
                  @foreach ($villes as $ville)
                    <option value="{{ $ville->id }}">{{ $ville->nom }}</option>
                  @endforeach



                </select>
              </div>
            </div> --}}

            <div class="col-12 col-md-6 col-xl-2">
              <div class="form-group">
                <label>Sexe</label>
                <div class="col-lg-9">
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="sexe" id="gender_male" value="1"
                      {{ auth()->user()->sexe === 1 || old('sexe') === 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="gender_male">
                      Homme
                    </label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="sexe" id="gender_female" value="0"
                      {{ auth()->user()->sexe === 0 || old('sexe') === 0 ? 'checked' : '' }}>
                    <label class="form-check-label" for="gender_female">
                      Femme
                    </label>
                  </div>
                </div>
              </div>
            </div>
            {{-- END ROW 2 --}}

            {{-- ROW 3 --}}
            <div class="col-12 col-md-6 col-xl-2">
              <div class="form-group">
                <label>Téléphone </label>

                <div class="input-group">
                  <span class="input-group-text" id="basic-addon1">+212</span>
                  <input placeholder="612345678" type="text"
                    class="form-control @error('telephone') is-invalid @enderror" name="telephone"
                    value="{{ old('telephone', auth()->user()->telephone) }}">
                  @error('telephone')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
                </div>
              </div>
            </div>

            <div class="col-12 col-md-6 col-xl-2">
              <div class="form-group">
                <label>Email </label>
                <input type="text" class="form-control @error('email') is-invalid @enderror" name="email"
                  disabled value="{{ old('email', auth()->user()->email) }}">
                @error('email')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
              </div>
            </div>
            <div class="col-12 col-md-6 col-xl-2">
              <div class="form-group">
                <label>Ville</label>
                <select required class="form-control @error('ville') is-invalid @enderror" name="ville">

                  <option disabled selected>Changer Ville</option>
                  @foreach ($villes as $ville)
                    <option {{ auth()->user()->ville == $ville->id || old('ville') == $ville->id ? 'selected' : '' }}
                      value="{{ $ville->id }}">
                      {{ $ville->nom }}</option>
                  @endforeach

                  @error('ville')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
                </select>
              </div>
            </div>

            <div class="col-12 col-md-6 col-xl-2">
              <div class="form-group">
                <label>Situation familiale</label>
                <select required class="form-control @error('situation_familiale') is-invalid @enderror"
                  name="situation_familiale">

                  <option disabled selected>-- Sélectionner Situation --</option>
                  <option
                    {{ auth()->user()->situation_familiale == 'c' || old('situation_familiale') == 'c' ? 'selected' : '' }}
                    value="c">
                    Célibataire</option>
                  <option
                    {{ auth()->user()->situation_familiale == 'm' || old('situation_familiale') == 'm' ? 'selected' : '' }}
                    value="m">Marié(e)
                  </option>
                  <option
                    {{ auth()->user()->situation_familiale == 'd' || old('situation_familiale') == 'd' ? 'selected' : '' }}
                    value="d">Divorcé(e)
                  </option>
                  <option
                    {{ auth()->user()->situation_familiale == 'v' || old('situation_familiale') == 'v' ? 'selected' : '' }}
                    value="v">Veuf/Veuve
                  </option>
                  <option
                    {{ auth()->user()->situation_familiale == 'a' || old('situation_familiale') == 'a' ? 'selected' : '' }}
                    value="a">Autre
                  </option>
                </select>
                @error('situation_familiale')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
              </div>
            </div>


            <div class="col-12 col-md-6 col-xl-2">
              <div class="form-group">
                <div class="change-avatar">
                  <div class="upload-img">
                    <div class="change-photo-btn">
                      <span><i class="fa fa-upload"></i>Photo personnelle</span><br>
                      {{-- accept=".jpg" --}}
                      @if (isset(auth()->user()->photo))
                        <div class="d-flex">
                          <a href="{{ asset('storage/documents/' . auth()->user()->code_massar . '/' . auth()->user()->photo) }}"
                            target="_blank" download class="">photo_personnelle.png<i
                              class="fa-solid fa-download"></i></a>
                        </div>
                      @endif

                      <input type="file" class="form-control upload   @error('photo') is-invalid @enderror"
                        name="photo">
                      <small class="form-text text-muted">Fichier .JPG Taille maximale de 200Ko</small>

                      @error('photo')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                      @enderror
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-12 col-md-6 col-xl-2">
              <div class="form-group">
                <label>Vous êtes fonctionnaire ? </label>
                <div class="col-lg-9">
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="fonctionnaire" id="oui" value="1"
                      {{ auth()->user()->fonctionnaire === 1 || old('fonctionnaire') === 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="oui">
                      Oui
                    </label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="fonctionnaire" id="no" value="0"
                      {{ auth()->user()->fonctionnaire === 0 || old('fonctionnaire') === 0 ? 'checked' : '' }}>
                    <label class="form-check-label" for="no">
                      Non
                    </label>
                  </div>
                </div>
              </div>
            </div>
            {{-- END ROW 3 --}}
            {{-- ROW 4 --}}
            <div class="row form-row">
              <div class="col-12 col-md-6 col-xl-4">
                <div class="form-group">
                  <label>Adresse personnelle</label>
                  <input required placeholder="Adresse personnelle  " type="text"
                    class="form-control @error('adresse_perso1') is-invalid @enderror" name="adresse_perso1"
                    value="{{ old('adresse_perso1', auth()->user()->adresse_perso1) }}">
                  @error('adresse_perso1')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
                </div>
              </div>
              <div class="col-12 col-md-6 col-xl-4">
                <div class="form-group">
                  <label>Adresse personnelle 2</label>
                  <input required placeholder="Adresse personnelle 2 " type="text"
                    class="form-control @error('adresse_perso2') is-invalid @enderror" name="adresse_perso2"
                    value="{{ old('adresse_perso2', auth()->user()->adresse_perso2) }}">
                  @error('adresse_perso2')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
                </div>
              </div>
              <div class="col-12 col-md-6 col-xl-4">
                <div class="form-group">
                  <label>Adresse personnelle 3</label>
                  <input required placeholder="Adresse personnelle 3 " type="text"
                    class="form-control @error('adresse_perso3') is-invalid @enderror" name="adresse_perso3"
                    value="{{ old('adresse_perso3', auth()->user()->adresse_perso3) }}">
                  @error('adresse_perso3')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
                </div>
              </div>
            </div>


            {{-- END ROW 4 --}}
          </div>



          {{-- ROW 5 --}}
          <div class="comp-header mb-2">
            <h3 class="comp-title">Informations du Baccalauréat</h3>
            <div class="line"></div>
          </div>
          <div class="row form-row">
            <div class="col-12 col-md-6 col-xl-3">
              <div class="form-group">
                <label>Année d'obtenation :</label>
                <input required placeholder="EX: 2023" type="text"
                  class="form-control @error('annee_obt_bac') is-invalid @enderror" name="annee_obt_bac"
                  value="{{ old('annee_obt_bac', auth()->user()->dossier->annee_obt_bac) }}">
                @error('annee_obt_bac')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
              </div>

            </div>
            <div class="col-12 col-md-6 col-xl-3">
              <div class="form-group">
                <label>Série du bac </label>
                <select class="form-control @error('serie_bac') is-invalid @enderror" name="serie_bac">
                  <option disabled selected> Sélectionner un type</option>
                  <option
                    {{ auth()->user()->dossier->serie_bac == 'sma' || old('serie_bac') == 'sma' ? 'selected' : '' }}
                    value="sma">Science
                    Math A
                  </option>
                  <option
                    {{ auth()->user()->dossier->serie_bac == 'smb' || old('serie_bac') == 'smb' ? 'selected' : '' }}
                    value="smb">Science
                    Math B
                  </option>
                  <option {{ auth()->user()->dossier->serie_bac == 'pc' || old('serie_bac') == 'pc' ? 'selected' : '' }}
                    value="pc">Science
                    Physiques
                  </option>
                  <option
                    {{ auth()->user()->dossier->serie_bac == 'svt' || old('serie_bac') == 'svt' ? 'selected' : '' }}
                    value="svt">Science vie
                    et terre
                  </option>
                  <option
                    {{ auth()->user()->dossier->serie_bac == 'autre' || old('serie_bac') == 'autre' ? 'selected' : '' }}
                    value="autre">Autre
                  </option>
                </select>
                @error('serie_bac')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror

              </div>
            </div>
            <div class="col-12 col-md-6 col-xl-3">
              <div class="form-group">
                <label>Note du baccalauréat </label>
                <input required placeholder="EX: 16.41" type="text"
                  class="form-control @error('moyenne_bac') is-invalid @enderror" name="moyenne_bac"
                  value="{{ old('moyenne_bac', auth()->user()->dossier->moyenne_bac) }}">
                @error('moyenne_bac')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
              </div>
            </div>
            <div class="col-12 col-md-6 col-xl-3">
              <div class="form-group">
                <label>Mention du bac </label>
                <select class="form-control @error('mention_bac') is-invalid @enderror"name="mention_bac">
                  <option selected> Sélectionner la mention</option>
                  <option
                    {{ auth()->user()->dossier->mention_bac === 'Excellent' || old('mention_bac') === 'Excellent' ? 'selected' : '' }}
                    value="Excellent">Excellent
                  </option>
                  <option
                    {{ auth()->user()->dossier->mention_bac == 'T.Bien' || old('mention_bac') == 'T.Bien' ? 'selected' : '' }}
                    value="T.Bien">Très Bien
                  </option>
                  <option
                    {{ auth()->user()->dossier->mention_bac == 'Bien' || old('mention_bac') == 'Bien' ? 'selected' : '' }}
                    value="Bien">Bien
                  </option>
                  <option
                    {{ auth()->user()->dossier->mention_bac == 'A.Bien' || old('mention_bac') == 'A.Bien' ? 'selected' : '' }}
                    value="A.Bien">Assez Bien
                  </option>
                  <option
                    {{ auth()->user()->dossier->mention_bac == 'Passable' || old('mention_bac') == 'Passable' ? 'selected' : '' }}
                    value="Passable">Passable
                  </option>
                </select>
                @error('mention_bac')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
              </div>
            </div>
            <div class="col-12 col-md-6 col-xl-3">
              <div class="form-group">
                <label>Province du bac :</label>
                <select class="form-control @error('province_bac') is-invalid @enderror" name="province_bac">
                  <option disabled selected>-- Sélectionner Ville --</option>
                  @foreach ($villes as $ville)
                    <option
                      {{ auth()->user()->dossier->province_bac == $ville->id || old('province_bac') == $ville->id ? 'selected' : '' }}
                      value="{{ $ville->id }}">{{ $ville->nom }}</option>
                  @endforeach
                </select>
                @error('province_bac')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
              </div>
            </div>

            <div class="col-12 col-md-6 col-xl-3">
              <div class="form-group">
                <div class="change-avatar">
                  <div class="upload-img">
                    <div class="change-photo-btn">
                      <span><i class="fa fa-upload"></i>Joignez votre baccalauréat</span><br>
                      @if (isset(auth()->user()->dossier->bac_document))
                        <div class="d-flex">
                          <a href="{{ asset('storage/documents/' . auth()->user()->code_massar . '/' . auth()->user()->dossier->bac_document) }}"
                            target="_blank" download>bac.pdf <i class="fa-solid fa-download"></i></a>
                        </div>
                      @endif

                      <input type="file" class="form-control upload   @error('bac_document') is-invalid @enderror"
                        name="bac_document">
                      <small class="form-text text-muted">Fichier .PDF Taille maximale de 700Ko</small>

                      @error('bac_document')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                      @enderror
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-12 col-md-6 col-xl">
              <div class="form-group">
                <label>Académie </label>
                <input required type="text" class="form-control @error('academie') is-invalid @enderror"
                  name="academie" value="{{ old('academie', auth()->user()->dossier->academie) }}">
                @error('academie')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
              </div>
            </div>

          </div>







          {{-- BAC + 2 --}}
          <div class="comp-header mb-2">
            <h3 class="comp-title">Informations du diplôme (BAC+2)</h3>
            <div class="line"></div>
          </div>

          <div class="row form-row">
            <div class="col-12 col-md-6 col-xl-3">
              <div class="form-group">
                <label>Année d'obtenation du diplôme
                </label>
                <input required placeholder="EX: 2023" type="text"
                  class="form-control @error('annee_obt_diplome') is-invalid @enderror" name="annee_obt_diplome"
                  value="{{ old('annee_obt_diplome', auth()->user()->dossier->annee_obt_diplome) }}">
                @error('annee_obt_diplome')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
              </div>
            </div>


            <div class="col-12 col-md-6 col-xl-3">
              <div class="form-group">
                <label>Type diplôme </label>
                <input required placeholder="EX: DUT,DEUG,BTS,DTS..." type="text"
                  class="form-control @error('type_diplome') is-invalid @enderror" name="type_diplome"
                  value="{{ old('type_diplome', auth()->user()->dossier->type_diplome) }}">
                @error('type_diplome')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
              </div>
            </div>

            <div class="col-12 col-md-6 col-xl-3">
              <div class="form-group">
                <label>Note du diplôme</label>
                <input required type="text" class="form-control @error('moyenne_diplome') is-invalid @enderror"
                  name="moyenne_diplome" placeholder="EX: 16.58"
                  value="{{ old('moyenne_diplome', auth()->user()->dossier->moyenne_diplome) }}">
                @error('moyenne_diplome')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
              </div>
            </div>
            <div class="col-12 col-md-6 col-xl-3">
              <div class="form-group">
                <label>Mention du diplôme </label>
                <select class="form-control @error('mention_diplome') is-invalid @enderror"name="mention_diplome"
                  value="{{ auth()->user()->dossier->mention_diplome }}">
                  <option selected> Sélectionner la mention</option>
                  <option
                    {{ auth()->user()->dossier->mention_diplome == '1' || old('mention_diplome') == '1' ? 'selected' : '' }}
                    value="1">Très Bien</option>
                  <option
                    {{ auth()->user()->dossier->mention_diplome == '2' || old('mention_diplome') == '2' ? 'selected' : '' }}
                    value="2">Bien</option>
                  <option
                    {{ auth()->user()->dossier->mention_diplome == '3' || old('mention_diplome') == '3' ? 'selected' : '' }}
                    value="3">Assez Bien</option>
                  <option
                    {{ auth()->user()->dossier->mention_diplome == '4' || old('mention_diplome') == '4' ? 'selected' : '' }}
                    value="4">Passable</option>
                </select>
                @error('mention_diplome')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
              </div>
            </div>
            <div class="col-12 col-md-6 col-xl-6">
              <div class="form-group">
                <label>Specialité du diplôme </label>
                <input required type="text" class="form-control @error('specialite_diplome') is-invalid @enderror"
                  name="specialite_diplome" placeholder="Ex : Génie informatique"
                  value="{{ old('specialite_diplome', auth()->user()->dossier->specialite_diplome) }}">
                @error('specialite_diplome')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
              </div>
            </div>

            <div class="col-12 col-md-6 col-xl-6">
              <div class="form-group">
                <label>Établissement ayant fournie le diplôme</label>
                <input required type="text" class="form-control @error('etablissement') is-invalid @enderror"
                  name="etablissement" value="{{ old('etablissement', auth()->user()->dossier->etablissement) }}">
                @error('etablissement')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
              </div>
            </div>

            <div class="col-12 col-md-6 col-xl-3">
              <div class="form-group">
                <label>Note S1 </label>
                <input required placeholder="EX: 15.54" type="text"
                  class="form-control @error('note_s1') is-invalid @enderror"name="note_s1"
                  value="{{ old('note_s1', auth()->user()->dossier->note_s1) }}">
                @error('note_s1')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
              </div>
            </div>

            <div class="col-12 col-md-6 col-xl-3">
              <div class="form-group">
                <label>Note S2</label>
                <input required placeholder="EX: 15.54" type="text"
                  class="form-control @error('note_s2') is-invalid @enderror"name="note_s2"
                  value="{{ old('note_s2', auth()->user()->dossier->note_s2) }}">
                @error('note_s2')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
              </div>
            </div>

            <div class="col-12 col-md-6 col-xl-3">
              <div class="form-group">
                <label>Note S3</label>
                <input required placeholder="EX: 15.54" type="text"
                  class="form-control @error('note_s3') is-invalid @enderror"name="note_s3"
                  value="{{ old('note_s3', auth()->user()->dossier->note_s3) }}">
                @error('note_s3')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
              </div>
            </div>

            <div class="col-12 col-md-6 col-xl-3">
              <div class="form-group">
                <label>Note S4</label>
                <input required placeholder="EX: 15.54" type="text"
                  class="form-control @error('note_s4') is-invalid @enderror"name="note_s4"
                  value="{{ old('note_s4', auth()->user()->dossier->note_s4) }}">
                @error('note_s4')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
              </div>
            </div>

            {{-- Relevé de notes  --}}
            <div class="comp-header mb-2">
              <h5 class="comp-title">Documents</h5>
              <div class="line"></div>
            </div>
            <div class="col-12 col-md-6 col-xl-4">
              <div class="form-group">
                <div class="change-avatar">
                  <div class="upload-img">
                    <div class="change-photo-btn">
                      <span><i class="fa fa-upload"></i>Relevé du notes </span><br>
                      @if (isset(auth()->user()->dossier->releve_note))
                        <div class="d-flex">
                          <a href="{{ asset('storage/documents/' . auth()->user()->code_massar . '/' . auth()->user()->dossier->releve_note) }}"
                            target="_blank" download class="">Télécharger <i
                              class="fa-solid fa-download"></i></a>
                        </div>
                      @endif
                      <input type="file" class="form-control upload   @error('releve_note') is-invalid @enderror"
                        name="releve_note">
                      <small class="form-text text-muted">Fichier .PDF Taille maximale de 700Ko</small>

                      @error('releve_note')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                      @enderror
                    </div>
                  </div>
                </div>
              </div>
            </div>



            <div class="col-12 col-md-6 col-xl-4">
              <div class="form-group">
                <div class="change-avatar">
                  <div class="upload-img">
                    <div class="change-photo-btn">
                      <span><i class="fa fa-upload"></i>Joignez votre diplôme ou attestation de
                        réussite</span><br>
                      @if (isset(auth()->user()->dossier->diplome_document))
                        <div class="d-flex">
                          <a href="{{ asset('storage/documents/' . auth()->user()->code_massar . '/' . auth()->user()->dossier->diplome_document) }}"
                            target="_blank" download class="">diplôme.pdf <i
                              class="fa-solid fa-download"></i></a>
                        </div>
                      @endif
                      <input type="file"
                        class="form-control upload  @error('diplome_document') is-invalid @enderror"
                        name="diplome_document">
                      <small class="form-text text-muted">Fichier .PDF Taille maximale de 700Ko</small>

                      @error('diplome_document')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                      @enderror
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-12 col-md-6 col-xl-4">
              <div class="form-group">
                <div class="change-avatar">
                  <div class="upload-img">
                    <div class="change-photo-btn">
                      <span><i class="fa fa-upload"></i>Joignez Votre CV</span><br>
                      @if (isset(auth()->user()->dossier->cv))
                        <div class="d-flex">
                          <a href="{{ asset('storage/documents/' . auth()->user()->code_massar . '/' . auth()->user()->dossier->cv) }}"
                            target="_blank" download class="">cv.pdf <i class="fa-solid fa-download"></i></a>
                        </div>
                      @endif

                      <input type="file" class="form-control upload   @error('cv') is-invalid @enderror"
                        name="cv">
                      <small class="form-text text-muted">Fichier .PDF Taille maximale de 700Ko</small>

                      @error('cv')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                      @enderror
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="submit-section">
              <button type="submit" class="btn btn-primary submit-btn">Enregistrer </button>
            </div>
          </div>
        </form>
      </div>
    </div>



  </div>

  </div>
  </div>

  {{-- Contennt --}}
@endsection
