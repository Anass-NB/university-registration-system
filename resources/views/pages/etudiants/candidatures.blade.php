@extends('layouts.admin_layout')

@section('title')
  Mes Candidatures
@endsection
@section('sidebar')
  @include('pages.etudiants.sidebar')
@endsection
@section('header')
  @include('pages.etudiants.header')
@endsection
@section('content')
  {{-- Contennt --}}
  <!-- Page Wrapper -->


  <!-- Page Header -->
  <div class="page-header">
    <div class="row">
      <div class="col-sm-12">
        <h3 class="page-title">Mes Candidatures</h3>
        <ul class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
          <li class="breadcrumb-item active">Mes Candidatures</li>
        </ul>
      </div>
    </div>
  </div>
  <!-- /Page Header -->

  <div class="row">
    <div class="col-md-12">
      <h4 class="mb-4">Mes Candidatures</h4>

      <div class="card card-table">
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-hover table-center mb-0">
              <thead>
                <tr>
                  <th>FORMATION</th>
                  <th>POSTULÉE A</th>
                  <th class="text-center">STATUS</th>
                  <th class="text-center">ACTION</th>
                </tr>
              </thead>
              <tbody>

                @forelse (Auth()->user()->candidatures as $candidature)
                  <tr>
                    <td>
                      <h2 class="table-avatar">
                        <a href="profile.html" class="avatar avatar-sm me-2"><img class="avatar-img rounded-circle"
                            src="{{ asset('assets/img/logos/estfbs-40x40.png') }}" alt="ESTFBS LOGO "></a>
                        <a href="profile.html">{{ $candidature->formation->nom }}
                          <span>ESTFBS</span></a>
                      </h2>
                    </td>
                    <td>{{ $candidature->created_at->format('d-m-Y') }}</td>
                    <td class="text-center">
                      <button type="button" class="btn btn-warning btn-sm">En cours de
                        traitement</button>
                    </td>
                    <td class="text-center">
                      <form action="{{ route('etudiant.candidaturedetails') }}" method="post">
                        @csrf
                        <input type="hidden" name="candidature_id" value="{{ $candidature->id }}">
                        <button class="btn btn-sm bg-info-light" type="submit"><i class="far fa-eye"></i> Reçu</button>
                        <a class="btn btn-sm bg-danger-light" data-bs-toggle="modal"
                          data-bs-target="#delete_candidature_{{ $candidature->id }}"><i
                            class="fa-solid fa-trash-can"></i> SUPPRIMER</a>

                      </form>
                    </td>
                  </tr>
                  {{-- DELETE CANDIDATURE --}}
                  <div class="modal fade" id="delete_candidature_{{ $candidature->id }}" tabindex="-1"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h1 class="modal-title fs-5" id="exampleModalLabel">Supprimer la candidature</h1>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          <div>
                            <p> Êtes-vous sûr de supprimer la candidature : <br>{{ $candidature->formation->nom }}</p>
                          </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                          <form action="{{ route('etudiant.candidaturedelete') }}" method="POST">
                            @csrf
                            <input type="hidden" name="candidature_id" value="{{ $candidature->id }}">
                            <input type="submit" value="Supprimer" class="btn btn-danger">
                          </form>
                        </div>
                      </div>

                    </div>
                  </div>

                @empty
                  <td colspan="4" class="text-danger">Accune Candidature </td>
                @endforelse

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
