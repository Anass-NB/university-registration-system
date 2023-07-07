@extends('layouts.admin_layout')

@section('title')
  Tous Les Formation
@endsection
@section('header')
  @include('pages.admin.header')
@endsection
@section('sidebar')
  @include('pages.admin.sidebar')
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
@section('content')
  {{-- Contennt --}}
  <!-- Page Wrapper -->


  <!-- Page Header -->
  <div class="page-header">
    <div class="row">
      <div class="col-sm-12">
        <h3 class="page-title">Ajouter une formation</h3>
        <ul class="breadcrumb">
          <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
          <li class="breadcrumb-item active">Ajouter une formation</li>

        </ul>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Ajouter une formation</h4>
        </div>
        <div class="card-body">
          @if ($errors->any())
            <div class="alert alert-danger">
              <ul>
                @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
          @endif
          <h4 class="card-title">Informations de la filière</h4>
          <form action="{{ route('formation.store') }}" method="POST">
            @csrf
            <div class="row">
              <div class="col-xl-12">
                <div class="form-group row">
                  <label class=" col-form-label ">Nom de la formation</label>
                  <div class="col">

                    <input type="text" name="nom" class="form-control @error('nom') is-invalid @enderror"
                      value="{{ old('nom') }}">
                    @error('nom')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>
                </div>




              </div>
              <div class="col-xl-6">
                <div class="form-group row">
                  <label class=" col-form-label ">Responsable du formation</label>
                  <div class="col">
                    <select required class="form-control" name="enseignant_id">
                      <option disabled selected>-- Select --</option>
                      @forelse ($enseignants as $enseignant)
                        @if (!isset($enseignant->formation))
                          <option value="{{ $enseignant->id }}">{{ $enseignant->nom }} {{ $enseignant->prenom }}</option>
                        @else
                          <option disabled value="{{ $enseignant->id }}">{{ $enseignant->nom }} {{ $enseignant->prenom }}
                          </option>
                        @endif
                      @empty
                        <option disabled>Aucun enseignant</option>
                      @endforelse
                    </select>
                  </div>
                </div>
              </div>
              <div class="col-xl-6">
                <div class="form-group row">
                  <label class=" col-form-label ">la durée de la formation (par ans)</label>
                  <div class="col">
                    <input placeholder="EX : 2" type="text" name="duree"
                      class="form-control @error('duree') is-invalid @enderror" value="{{ old('duree') }}">
                    @error('duree')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>
                </div>
              </div>
              <div class="col-xl-12">
                <div class="form-group row">
                  <label class=" col-form-label ">Description</label>
                  <div class="col">
                    <textarea id="mytextarea" rows="15" cols="5" name="description"
                      class="form-control @error('description') is-invalid @enderror" value="{{ old('description') }}"
                      placeholder="Description"></textarea>

                    @error('description')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>
                </div>
              </div>

              <div class="text-end">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
