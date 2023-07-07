@extends('layouts.admin_layout')

@section('title')
  Tous Les formations
@endsection
@section('header')
  @include('pages.admin.header')
@endsection


@section('styles')
  <script src="https://cdn.tiny.cloud/1/i1d0pegs5zyz1kp8ay78x0136qlua2yjzvo7yp3liz3xxh04/tinymce/6/tinymce.min.js"
    referrerpolicy="origin"></script>

  <script>
    tinymce.init({
      selector: 'textarea',
      plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed linkchecker a11ychecker tinymcespellchecker permanentpen powerpaste advtable advcode editimage tinycomments tableofcontents footnotes mergetags autocorrect typography inlinecss',
      toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
      tinycomments_mode: 'embedded',
      tinycomments_author: 'Author name',
      mergetags_list: [{
          value: 'First.Name',
          title: 'First Name'
        },
        {
          value: 'Email',
          title: 'Email'
        },
      ]
    });
  </script>
@endsection

@section('sidebar')
  @include('pages.admin.sidebar')
@endsection
@section('content')
  {{-- Contennt --}}
  <!-- Page Wrapper -->


  <!-- Page Header -->
  <div class="page-header">
    <div class="row">
      <div class="col-sm-12">
        <h3 class="page-title">La liste des Formations</h3>
        <ul class="breadcrumb">
          <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
          <li class="breadcrumb-item active">Tous les Formation</li>
        </ul>
      </div>
    </div>
  </div>
  <!-- /Page Header -->

  <div class="row">
    <div class="col-sm-12">
      <div class="card">
        <div class="card-header">
          {{-- <h4 class="card-title">Datatable des enseignant</h4> --}}
          <p class="card-text">
            <a href="{{ route('formation.create') }}" type="button" class="btn btn-primary"><i
                class="fa-solid fa-plus me-2"></i>Ajouter une
              formation</a>
            {{-- <button type="button" class="btn btn-primary">Primary</button>
            <button type="button" class="btn btn-primary">Primary</button> --}}
          </p>
        </div>
        <div class="card-body">



          <div class="table-responsive">
            <table class="datatable table table-stripped">
              <thead>
                <tr>
                  <th>Nom de formation</th>
                  <th>Responsable du formation</th>
                  <th>Duree</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>



                @foreach ($formations as $formation)
                  <tr>
                    <td>{{ $formation->nom }}</td>
                    <td>{{ $formation->enseignant->nom }} {{ $formation->enseignant->prenom }}</td>
                    <td>{{ $formation->duree }} ans</td>
                    <td>
                      <a data-bs-toggle="modal" href="#view_formation_{{ $formation->id }}"
                        class="btn btn-sm bg-info-light"><i class="far fa-eye"></i></a>
                      <a data-bs-toggle="modal" href="#editformation_{{ $formation->id }}"
                        class="btn btn-sm bg-warning-light"><i class="fa-solid fa-pen-to-square"></i></a>

                      <button style="margin: 0" type="button" class="btn btn-sm bg-danger-light" data-bs-toggle="modal"
                        data-bs-target="#delete_formation_{{ $formation->id }}">
                        <i class="fa-solid fa-trash-can"></i>
                      </button>
                    </td>
                  </tr>
                  <!-- Edit Details Modal -->
                  <div class="modal fade" id="editformation_{{ $formation->id }}" aria-hidden="true" role="dialog">
                    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title">Modifier une formation</h5>
                          <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <form action="{{ route('formation.update') }}" method="POST">
                            @csrf
                            <input type="hidden" name="id" value="{{ $formation->id }}">

                            <div class="row form-row">
                              <div class="col-xl-4 col-md-4 col-sm-6">
                                <div class="form-group">
                                  <label>Nom</label>
                                  <input type="text" name="nom"
                                    class="form-control @error('nom') is-invalid @enderror"
                                    value="{{ $formation->nom }}">
                                  @error('nom')
                                    <div class="invalid-feedback">
                                      {{ $message }}
                                    </div>
                                  @enderror

                                </div>
                              </div>
                              <div class="col-xl-4 col-md-4 col-sm-6">
                                <div class="form-group">
                                  <label>Responsable</label>
                                  <select required class="form-control" name="enseignant_id">
                                    <option disabled selected>-- Select --</option>
                                    @forelse ($enseignants as $enseignant)
                                      @if (!isset($enseignant->formation))
                                        <option value="{{ $enseignant->id }}">
                                          {{ $enseignant->nom }}
                                          {{ $enseignant->prenom }}</option>
                                      @elseif ($enseignant->id == $formation->enseignant->id)
                                        <option selected value="{{ $enseignant->id }}">
                                          {{ $enseignant->nom }}
                                          {{ $enseignant->prenom }}</option>
                                      @else
                                        <option disabled value="{{ $enseignant->id }}">
                                          {{ $enseignant->nom }}
                                          {{ $enseignant->prenom }}
                                        </option>
                                      @endif
                                    @empty
                                      <option disabled>Aucun enseignant</option>
                                    @endforelse
                                  </select>

                                </div>
                              </div>
                              <div class="col-xl-4 col-md-4 col-sm-6">
                                <div class="form-group">
                                  <label>Duree par an</label>
                                  <input type="text" name="duree"
                                    class="form-control @error('duree') is-invalid @enderror"
                                    value="{{ $formation->duree }}">
                                  @error('duree')
                                    <div class="invalid-feedback">
                                      {{ $message }}
                                    </div>
                                  @enderror

                                </div>
                              </div>


                              <div class="col-xl-12 col-md-12 col-sm-12">
                                <div class="form-group">
                                  <label>Description</label>
                                  <textarea name="description" id="mytextarea" class="form-control @error('description') is-invalid @enderror"
                                    cols="30" rows="10">{{ $formation->description }}</textarea>

                                  @error('description')
                                    <div class="invalid-feedback">
                                      {{ $message }}
                                    </div>
                                  @enderror

                                </div>
                              </div>


                            </div>

                            <button type="submit" class="btn btn-primary btn-block w-100">Sauvegarder les
                              modifications</button>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!--  End Edit Details Modal -->

                  <!-- Delete formation  Modal -->
                  <div class="modal fade" id="delete_formation_{{ $formation->id }}" tabindex="-1"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h1 class="modal-title fs-5" id="exampleModalLabel">Supprimer formation
                          </h1>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          <div>
                            Êtes-vous sûr de supprimer la formation : <br>{{ $formation->nom }}


                          </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                          <form action="{{ route('formation.delete') }}" method="POST">
                            @csrf
                            <input type="hidden" name="formation_id" value="{{ $formation->id }}">
                            <input type="submit" value="Supprimer" class="btn btn-danger">
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- End Delete formation  Modal -->

                  <!-- View Details Modal -->
                  <div class="modal fade" id="view_formation_{{ $formation->id }}" aria-hidden="true" role="dialog">
                    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title">Details d'une formation </h5>
                          <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <form action="" method="POST">
                            {{-- @csrf
                            <input type="hidden" name="id" value="{{ $formation->id }}"> --}}

                            <div class="row form-row">
                              <div class="col-xl-4 col-md-4 col-sm-6">
                                <div class="form-group">
                                  <label>Nom</label>
                                  <input type="text" name="nom" disabled
                                    class="form-control @error('nom') is-invalid @enderror"
                                    value="{{ $formation->nom }}">
                                  @error('nom')
                                    <div class="invalid-feedback">
                                      {{ $message }}
                                    </div>
                                  @enderror

                                </div>
                              </div>
                              <div class="col-xl-4 col-md-4 col-sm-6">
                                <div class="form-group">
                                  <label>Responsable</label>
                                  <input type="text" name="responsable" disabled
                                    class="form-control @error('responsable') is-invalid @enderror"
                                    value="{{ $formation->enseignant->nom }}">

                                  </select>

                                </div>
                              </div>
                              <div class="col-xl-4 col-md-4 col-sm-6">
                                <div class="form-group">
                                  <label>Duree par an</label>
                                  <input type="text" name="duree" disabled
                                    class="form-control @error('duree') is-invalid @enderror"
                                    value="{{ $formation->duree }}">
                                  @error('duree')
                                    <div class="invalid-feedback">
                                      {{ $message }}
                                    </div>
                                  @enderror

                                </div>
                              </div>


                              <div class="col-xl-12 col-md-12 col-sm-12">
                                <div class="form-group">
                                  <label>Description</label>
                                  {!! $formation->description !!}

                                  @error('description')
                                    <div class="invalid-feedback">
                                      {{ $message }}
                                    </div>
                                  @enderror

                                </div>
                              </div>


                            </div>

                            {{-- <button type="submit" class="btn btn-primary btn-block w-100">Sauvegarder les
                              modifications</button> --}}
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                  {{-- End view formation --}}
                @endforeach


              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>


  <!-- /Page Wrapper -->

  {{-- Contennt --}}
@endsection
