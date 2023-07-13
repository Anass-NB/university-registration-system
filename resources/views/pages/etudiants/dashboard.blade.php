@extends('layouts.admin_layout')

@section('title')
  Espace Etudiant
@endsection
@section('sidebar')
  @include('pages.etudiants.sidebar')
@endsection
@section('header')
  @include('pages.etudiants.header')
@endsection

@section('content')
  {{-- Contennt --}}

  <!-- Page Header -->
  <div class="page-header">
    <div class="row">
      <div class="col-sm-12">
        <h3 class="page-title">Bonjour {{ auth()->user()->nom }} {{ auth()->user()->prenom }}!</h3>
        <ul class="breadcrumb">
          <li class="breadcrumb-item active">Dashboard (Candidat)</li>
        </ul>
      </div>
    </div>
  </div>
  <!-- /Page Header -->
  <div class="comp-header mb-2">
    <h5 class="comp-title">Guide d'utilisation :</h3>
      <div class="line"></div>
  </div>
  <div class="alert alert-dark alert-dismissible fade show mb-0 mb-2 mt-2" role="alert">
    <i class="fa-solid fa-graduation-cap me-2"></i>Cette plateforme vous permet, avec un seul compte, de déposer vos
    candidatures électroniques pour les concours d'accès au licences professionelles.
  </div>
  <div class="alert alert-dark alert-dismissible fade show mb-0" role="alert">

    <i class="fa-regular fa-address-card me-2"></i>Avant de postuler à une formation veuillez remplir votre profile (pour
    accèder à votre profile : <u><a href="{{ route('etudiant.profile') }}" class="alert-link">profile</a></u>)
  </div>
  <div class="alert alert-danger alert-dismissible fade show mb-2 mt-2" role="alert">
    <i class="fa-solid fa-triangle-exclamation me-2"></i> Toute fausse information entraînera l’annulation de votre
    demande de pré-inscription
  </div>
  <div class="alert alert-success alert-dismissible fade show mb-0" role="alert">
    <i class="fa-solid fa-arrow-right-to-bracket me-2"></i>Après avoir remplir votre <u><a
        href="{{ route('etudiant.profile') }}" class="alert-link">profile</a></u> vous pouvez postuler a une ou plusieurs
    formations disponibles: via lien (<u><a href="{{ route('avislicencespro') }}" class="alert-link">Formations</a></u>)
  </div>





  {{-- Contennt --}}
@endsection
