@extends('layouts.admin_layout')

@section('title')
  Tous Les etudiants
@endsection
@section('sidebar')
  @include('pages.admin.sidebar')
@endsection
@section('header')
  @include('pages.admin.header')
@endsection
@section('content')
  {{-- Contennt --}}
  <!-- Page Wrapper -->


  <!-- Page Header -->
  <div class="page-header">
    <div class="row">
      <div class="col-sm-12">
        <h3 class="page-title"> Tous Les étudiants</h3>
        <ul class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
          <li class="breadcrumb-item active"> Tous Les étudiants</li>
        </ul>
      </div>
    </div>
  </div>
  <!-- /Page Header -->


  <div class="row">
    <div class="col-sm-12">
      <div class="card">
        {{-- @if ($errors->any())
            <div class="alert alert-danger">
              <ul>
                @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
          @endif --}}
        {{--  <div class="card-header">
           <h4 class="card-title">Datatable des enseignant</h4>
          {{-- <p class="card-text">
            <a href="{{ route('enseignant.create') }}" type="button" class="btn btn-primary">Ajouter un enseignant</a>
             <button type="button" class="btn btn-primary">Primary</button>
            <button type="button" class="btn btn-primary">Primary</button>
          </p>
        </div> --}}
        <div class="card-body">



          <div class="table-responsive ">
            <table class=" table table-stripped">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Nom et Prénom</th>
                  <th>Code Massar</th>
                  <th>Email</th>
                  <th>Telephone</th>
                  <th>Achèvement Du Profil</th>
                  <th>Control</th>

                </tr>
              </thead>
              <tbody>


                <?php $i = 1; ?>
                @foreach ($etudiants as $etudiant)
                  <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $etudiant->nom }} {{ $etudiant->prenom }}</td>
                    <td>{{ $etudiant->code_massar }}</td>
                    <td>{{ $etudiant->email }}</td>
                    <td>{{ $etudiant->telephone }}</td>
                    <td class="text-{{ $etudiant->profileCompletionColor() }}">
                      <strong>{{ $etudiant->profileCompletionPercentage() }} %</strong>
                    </td>

                    <td>
                      <a data-bs-toggle="modal" href="#view_etudiant_{{ $etudiant->id }}"
                        class="btn btn-sm bg-info-light"><i class="far fa-eye"></i></a>
                      {{-- Edit btn --}}
                      {{-- <a data-bs-toggle="modal" href="#editetudiant_{{ $etudiant->id }}"
                        class="btn btn-sm bg-warning-light"><i class="fa-solid fa-pen-to-square"></i></a> --}}

                      <button style="margin: 0" type="button" class="btn btn-sm bg-danger-light" data-bs-toggle="modal"
                        data-bs-target="#delete_etudiant_{{ $etudiant->id }}">
                        <i class="fa-solid fa-trash-can"></i>
                      </button>
                    </td>
                  </tr>
                  <!-- Delete etudiant  Modal -->

                  <!-- Modal -->
                  <div class="modal fade" id="delete_etudiant_{{ $etudiant->id }}" tabindex="-1"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h1 class="modal-title fs-5" id="exampleModalLabel">Supprimer etudiant
                          </h1>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          <div>
                            Êtes-vous sûr de supprimer l' etudiant :
                            <br>{{ $etudiant->nom }}{{ ' ' }}{{ $etudiant->prenom }}


                          </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                          <form action="{{ route('etudiant.delete') }}" method="POST">
                            @csrf
                            <input type="hidden" name="etudiant_id" value="{{ $etudiant->id }}">
                            <input type="submit" value="Supprimer" class="btn btn-danger">
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- End Delete etudiant  Modal -->
                  <!-- View Details Modal -->
                  <div class="modal fade" id="view_etudiant_{{ $etudiant->id }}" aria-hidden="true" role="dialog">
                    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title">Détails d'un étudiant </h5>
                          <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <form action="" method="POST">
                            {{-- @csrf
                                <input type="hidden" name="id" value="{{ $formation->id }}"> --}}

                            <div class="row form-row">
                              <div class="col-12 col-md-6 col-xl-2">
                                <div class="form-group">
                                  <label>Nom</label>
                                  <input type="text" class="form-control @error('nom') is-invalid @enderror"
                                    name="nom" disabled value="{{ $etudiant->nom }}">
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
                                  <input required type="text"
                                    class="form-control @error('prenom') is-invalid @enderror" name="prenom" disabled
                                    value="{{ $etudiant->prenom }}">
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
                                  <input required type="text"
                                    class="form-control @error('nom_ar') is-invalid @enderror" name="nom_ar" disabled
                                    value="{{ $etudiant->nom_ar }}">
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
                                  <input required type="text"
                                    class="form-control @error('prenom_ar') is-invalid @enderror" name="prenom_ar"
                                    disabled value="{{ $etudiant->prenom_ar }}">
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
                                  <input required type="text"
                                    class="form-control @error('code_massar') is-invalid @enderror" name="code_massar"
                                    disabled value="{{ $etudiant->code_massar }}">
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
                                  <input required type="text" class="form-control @error('cin') is-invalid @enderror"
                                    name="cin" disabled value="{{ $etudiant->cin }}">
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
                                  <input required type="text"
                                    class="form-control @error('lieu_naissance') is-invalid @enderror"
                                    name="lieu_naissance" disabled value="{{ $etudiant->lieu_naissance }}">
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
                                  <input required type="text"
                                    class="form-control @error('lieu_naissance_ar') is-invalid @enderror"
                                    name="lieu_naissance_ar" disabled value="{{ $etudiant->lieu_naissance_ar }}">
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
                                  <input type="text" class="form-control @error('pays') is-invalid @enderror"
                                    name="pays" disabled value="{{ $etudiant->pays }}">
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
                                  <input type="text" disabled class="form-control"
                                    value="{{ $etudiant->date_naissance }}">

                                </div>
                              </div>

                              <div class="col-12 col-md-6 col-xl-2">
                                <div class="form-group">
                                  <label>Province de naissance </label>
                                  <input type="text" disabled class="form-control"
                                    value="{{ $etudiant->province_naissance }}">

                                </div>
                              </div>


                              {{-- <div class="col-12 col-md-6 col-xl-2">
                                    <div class="form-group">
                                      <label>Province de naissance </label>
                                      <select required class="form-control @error('nom') is-invalid @enderror" name="province_naissance">

                                        @if ($etudiant->province_naissance != null)
                                          <option value="{{ $etudiant->province_naissance }}" selected>
                                            {{ $etudiant->province_naissance }}
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
                                  <label>Sexe : {{ $etudiant->sexe == 1 ? 'Masculin' : 'Féminin' }}</label>

                                </div>
                              </div>
                              {{-- END ROW 2 --}}

                              {{-- ROW 3 --}}
                              <div class="col-12 col-md-6 col-xl-2">
                                <div class="form-group">
                                  <label>Téléphone </label>
                                  <input placeholder="0612345678" type="number"
                                    class="form-control @error('telephone') is-invalid @enderror" name="telephone"
                                    disabled value="{{ $etudiant->telephone }}">
                                  @error('telephone')
                                    <div class="invalid-feedback">
                                      {{ $message }}
                                    </div>
                                  @enderror
                                </div>
                              </div>

                              <div class="col-12 col-md-6 col-xl-2">
                                <div class="form-group">
                                  <label>Email </label>
                                  <input type="text" class="form-control @error('email') is-invalid @enderror"
                                    name="email" disabled value="{{ $etudiant->email }}">
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
                                  <input type="text" disabled class="form-control" value="{{ $etudiant->ville }}">

                                </div>
                              </div>

                              <div class="col-12 col-md-6 col-xl-2">
                                <div class="form-group">
                                  <label>Situation familiale</label>
                                  <input type="text" disabled class="form-control"
                                    value="{{ $etudiant->situation_familiale }}">
                                  @error('situation_familiale')
                                    <div class="invalid-feedback">
                                      {{ $message }}
                                    </div>
                                  @enderror
                                </div>
                              </div>


                              {{-- <div class="col-12 col-md-6 col-xl-2">
                                    <div class="form-group">
                                      <div class="change-avatar">
                                        <div class="upload-img">
                                          <div class="change-photo-btn">
                                            <span><i class="fa fa-upload"></i>Photo personnelle</span><br>
                                            <input type="file" class="upload" name="photo">
                                            @error('photo')
                                              <div class="invalid-feedback">
                                                {{ $message }}
                                              </div>
                                            @enderror
                                          </div>
                                          <small class="form-text text-muted">Fichier .JPG Taille maximale de 200Ko</small>
                                        </div>
                                      </div>
                                    </div>
                                  </div> --}}
                              <div class="col-12 col-md-6 col-xl-2">
                                <div class="form-group">
                                  <label>Fonctionnaire :
                                    {{ ($etudiant->fonctionnaire == 1 ? 'OUI' : $etudiant->fonctionnaire == 0) ? 'NON' : 'INCONNU' }}
                                  </label>


                                </div>
                              </div>
                              {{-- END ROW 3 --}}
                              {{-- ROW 4 --}}
                              <div class="row form-row">
                                <div class="col-12 col-md-6 col-xl-4">
                                  <div class="form-group">
                                    <label>Adresse personnelle</label>
                                    <input required placeholder="Adresse personnelle  " type="text" disabled
                                      class="form-control @error('adresse_perso1') is-invalid @enderror"
                                      name="adresse_perso1" value="{{ $etudiant->adresse_perso1 }}">
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
                                    <input required placeholder="Adresse personnelle 2 " type="text" disabled
                                      class="form-control @error('adresse_perso2') is-invalid @enderror"
                                      name="adresse_perso2" value="{{ $etudiant->adresse_perso2 }}">
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
                                    <input required placeholder="Adresse personnelle 3 " type="text" disabled
                                      class="form-control @error('adresse_perso3') is-invalid @enderror"
                                      name="adresse_perso3" value="{{ $etudiant->adresse_perso3 }}">
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
                        </div>

                        {{-- <button type="submit" class="btn btn-primary btn-block w-100">Sauvegarder les
                                  modifications</button> --}}
                        </form>
                      </div>
                    </div>
                  </div>
          </div>

          {{-- End view etudiant  --}}
          <!-- Edit Details Modal -->
          <div class="modal fade" id="editetudiant_{{ $etudiant->id }}" aria-hidden="true" role="dialog">
            <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Modifier une etudiant</h5>
                  <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form action="{{ route('etudiant.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{ $etudiant->id }}">
                    <div class="row form-row">
                      <div class="row form-row">
                        {{-- Row 1 --}}
                        <div class="col-12 col-md-6 col-xl-2">
                          <div class="form-group">
                            <label>Nom</label>
                            <input type="text" class="form-control @error('nom') is-invalid @enderror"
                              name="nom" value="{{ $etudiant->nom }}">
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
                            <input required type="text" class="form-control @error('prenom') is-invalid @enderror"
                              name="prenom" value="{{ $etudiant->prenom }}">
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
                            <input required type="text" class="form-control @error('nom_ar') is-invalid @enderror"
                              name="nom_ar" value="{{ $etudiant->nom_ar }}">
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
                            <input required type="text"
                              class="form-control @error('prenom_ar') is-invalid @enderror" name="prenom_ar"
                              value="{{ $etudiant->prenom_ar }}">
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
                            <input required type="text"
                              class="form-control @error('code_massar') is-invalid @enderror" name="code_massar"
                              value="{{ $etudiant->code_massar }}">
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
                            <input required type="text" class="form-control @error('cin') is-invalid @enderror"
                              name="cin" value="{{ $etudiant->cin }}">
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
                            <input required type="text"
                              class="form-control @error('lieu_naissance') is-invalid @enderror" name="lieu_naissance"
                              value="{{ $etudiant->lieu_naissance }}">
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
                            <input required type="text"
                              class="form-control @error('lieu_naissance_ar') is-invalid @enderror"
                              name="lieu_naissance_ar" value="{{ $etudiant->lieu_naissance_ar }}">
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
                            <input type="text" class="form-control @error('pays') is-invalid @enderror"
                              name="pays" value="{{ $etudiant->pays }}">
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
                            @if ($etudiant->date_naissance != null)
                              <input type="date" class="form-control @error('date_naissance') is-invalid @enderror"
                                name="date_naissance" value="{{ $etudiant->date_naissance }}">
                            @else
                              <input required type="date"
                                class="form-control @error('date_naissance') is-invalid @enderror "
                                name="date_naissance">
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
                              @if ($etudiant->province_naissance != null)
                                <option value="{{ $etudiant->province_naissance }}" selected>
                                  {{ $etudiant->province_naissance_etudiant->nom }}
                                </option>
                              @else
                                <option disabled selected>Changer Ville</option>
                              @endif
                              @foreach ($villes as $ville)
                                <option value="{{ $ville->id }}">{{ $ville->nom }}
                                </option>
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

                                      @if ($etudiant->province_naissance != null)
                                        <option value="{{ $etudiant->province_naissance }}" selected>
                                          {{ $etudiant->province_naissance }}
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
                                <input class="form-check-input" type="radio" name="sexe" id="gender_male"
                                  value="1" {{ $etudiant->sexe == 1 ? 'checked' : '' }}>
                                <label class="form-check-label" for="gender_male">
                                  Male
                                </label>
                              </div>
                              <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="sexe" id="gender_female"
                                  value="0" {{ $etudiant->sexe == 0 ? 'checked' : '' }}>
                                <label class="form-check-label" for="gender_female">
                                  Female
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
                            <input placeholder="0612345678" type="number"
                              class="form-control @error('telephone') is-invalid @enderror" name="telephone"
                              value="{{ $etudiant->telephone }}">
                            @error('telephone')
                              <div class="invalid-feedback">
                                {{ $message }}
                              </div>
                            @enderror
                          </div>
                        </div>

                        <div class="col-12 col-md-6 col-xl-2">
                          <div class="form-group">
                            <label>Email </label>
                            <input type="text" class="form-control @error('email') is-invalid @enderror"
                              name="email" value="{{ $etudiant->email }}">
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
                              <option disabled selected>-- Sélectionner Ville --</option>
                              @foreach ($villes as $ville)
                                <option value="{{ $ville->id }}">{{ $ville->nom }}
                                </option>
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
                              <option value="c"> Célibataire</option>
                              <option value="m">Marié(e)</option>
                              <option value="d">Divorcé(e)</option>
                              <option value="v">Veuf/Veuve</option>
                              <option value="a">Autre</option>
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
                                  <span><i class="fa fa-upload"></i>Photo
                                    personnelle</span><br>
                                  <input type="file" class="upload" name="photo">
                                  @error('photo')
                                    <div class="invalid-feedback">
                                      {{ $message }}
                                    </div>
                                  @enderror
                                </div>
                                <small class="form-text text-muted">Fichier .JPG Taille
                                  maximale de 200Ko</small>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-12 col-md-6 col-xl-2">
                          <div class="form-group">
                            <label>Vous êtes fonctionnaire ? </label>
                            <div class="col-lg-9">
                              <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="fonctionnaire" id="oui"
                                  value="1" {{ $etudiant->fonctionnaire == 1 ? 'checked' : '' }}>
                                <label class="form-check-label" for="oui">
                                  Oui
                                </label>
                              </div>
                              <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="fonctionnaire" id="no"
                                  value="0" {{ $etudiant->fonctionnaire == 0 ? 'checked' : '' }}>
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
                                class="form-control @error('adresse_perso1') is-invalid @enderror"
                                name="adresse_perso1" value="{{ $etudiant->adresse_perso1 }}">
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
                                class="form-control @error('adresse_perso2') is-invalid @enderror"
                                name="adresse_perso2" value="{{ $etudiant->adresse_perso2 }}">
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
                                class="form-control @error('adresse_perso3') is-invalid @enderror"
                                name="adresse_perso3" value="{{ $etudiant->adresse_perso3 }}">
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
                      <button type="submit" class="btn btn-primary btn-block w-100">Sauvegarder les
                        modifications</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <!-- End Edit Details Modal -->
          @endforeach




          </tbody>
          </table>
          {{ $etudiants->links('pagination::custom') }}

        </div>
      </div>
    </div>
  </div>
  </div>
@endsection

@section('scripts')
  <script>
    $(document).ready(function() {
      $('#myTable').DataTable();
    });
  </script>
@endsection
