<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
  <title>ESTFBS - Incscription en licences professionnelles </title>

  <!-- Favicon -->
  <link rel="icon" href="{{ asset('assets/img/estfbs-ico.png') }}" type="image/x-icon">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">

  <!-- Fontawesome CSS -->
  <link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
  <link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">

  <!-- Select2 CSS -->
  <link rel="stylesheet" href="assets/plugins/select2/css/select2.min.css">

  <!-- Aos CSS -->
  <link rel="stylesheet" href="assets/plugins/aos/aos.css">

  <!-- Slick Slider CSS -->
  <link rel="stylesheet" href="assets/plugins/slick/slick.css">
  <link rel="stylesheet" href="assets/plugins/slick/slick-theme.css">

  <!-- Main CSS -->
  <link rel="stylesheet" href="assets/css/style.css">

</head>

<body>

  <!-- Main Wrapper -->
  <div class="main-wrapper">

    <!-- Header -->
    @include('layouts.frontend.header')
    <!-- /Header -->

    <!-- Home Banner -->
    <section class="section section-search-eight">
      <div class="container">
        <div class="banner-wrapper-eight m-auto text-center">
          <div id="accueil" class="banner-header aos" data-aos="fade-up">
            <h1>Portail de pré-candidature en ligne aux formations<span> <br> licences professionnelles <br> </span>
              2023-2024</h1>
            <p>Bienvenue sur le Portail de pré-candidature en ligne aux formations licences professionnelles de L'école
              Supérieure de Technologie – Fkih Ben Salah.
            </p>
          </div>

          <!-- Search -->
          {{-- <div class="search-box-eight aos" data-aos="fade-up">
            <form action="search.html">
              <div class="form-search">
                <div class="form-inner">
                  <div class="form-group search-location-eight">
                    <i class="material-icons">my_location</i>
                    <select class="form-control select">
                      <option>Location</option>
                      <option>Japan</option>
                      <option>France</option>
                    </select>
                  </div>
                  <div class="form-group search-info-eight">
                    <i class="material-icons">location_city</i>
                    <input type="text" class="form-control"
                      placeholder="Search School, Online educational centers, etc">
                  </div>
                  <button type="submit" class="btn search-btn-eight mt-0">Search <i
                      class="fas fa-long-arrow-alt-right"></i></button>
                </div>
              </div>
            </form>
          </div> --}}
          <!-- /Search -->
          <div class="row  aos" data-aos="fade-up">
            <div class="statistics-list-eight">
              {{-- <div class="statistics-icon-eight">
                <i class="fas fa-history"></i>
              </div> --}}
              <div class="statistics-content-eight">
                {{-- <span>120+</span> --}}
                <h3>La plateforme de pré-candidature aux formations licences professionnelles permet aux
                  candidats de postuler
                  aux formations licences professionnelles accréditées dans établissements relevant de L'école
                  Supérieure de Technologie – Fkih Ben Salah en ligne.</h3>
              </div>
            </div>

          </div>

          <a href="#procedure" class="go-down-lin" style="color: #FE9445"><i class="fas fa-arrow-down"></i></a>
        </div>
      </div>
    </section>
    <!-- /Home Banner -->

    <!-- Work Flow -->
    <section class="section how-it-works-section">
      <div class="container">
        <div id="procedure" class="section-header-eight text-center aos" data-aos="fade-up">
          <span>ESTFBS</span>
          <h2>Comment ça fonctionne ?</h2>
          <p class="sub-title">plateforme de pré-candidature aux formations licences professionnelles</p>
          <div class="sec-dots">
            <span></span>
            <span></span>
            <span></span>
          </div>
        </div>
        <div class="row justify-content-center feature-list">
          <div class="col-12 col-md-4 col-lg-3 aos" data-aos="fade-up">
            <div class="feature-grid text-center top-box">
              <div class="feature-header-eight">
                <div class="feature-icon-eight">
                  <span class="circle bg-green"><i class="fas fa-sign-in-alt"></i></span>
                </div>
                <div class="feature-cont">
                  <div class="feature-text-eight">La plateforme</div>
                </div>
              </div>
              <p>La plateforme de pré- candidature aux formations licence professionnelle permet aux candidats de
                postuler aux
                formations licences professionnelles accréditées dans L'école Supérieure de Technologie – Fkih Ben Salah
                exclustvement en ligne.</p>
              <span class="text-green">01</span>
            </div>
          </div>
          <div class="col-12 col-md-4 col-lg-3 offset-lg-1 aos" data-aos="fade-up">
            <div class="feature-grid text-center">
              <div class="feature-header-eight">
                <div class="feature-icon-eight">
                  <span class="circle bg-blue"><i class="fas fa-file-upload"></i></span>
                </div>
                <div class="feature-cont">
                  <div class="feature-text-eight">Les Informations personnelles</div>
                </div>
              </div>
              <p>Informations personnelles Avant de postuler å une formation licence professionnelle, le candidat est
                invité å saisir
                informations personnelles, charger sa photo didentité, son CV et sa Carte Nationale dldentité
                Electronique (Scannée recto- verso).</p>
              <span class="text-blue">02</span>
            </div>
          </div>
          <div class="col-12 col-md-4 col-lg-3 offset-lg-1 aos" data-aos="fade-up">
            <div class="feature-grid text-center top-box">
              <div class="feature-header-eight">
                <div class="feature-icon-eight">
                  <span class="circle bg-orange"><i class="fas fa-globe-africa"></i></span>
                </div>
                <div class="feature-cont">
                  <div class="feature-text-eight">Diplomes étrangers</div>
                </div>
              </div>
              <p>Diplomes étrangers Pour les diplomes étrangers le candidat doit charger l'attestation d'équivalence en
                format JPEG - PDF publiée au bulletin offciel.</p>
              <span class="text-orange">03</span>
            </div>
          </div>
        </div>
      </div>
    </section>



    <!-- Footer -->
    @include('layouts.frontend.footer')
    <!-- /Footer -->

  </div>
  <!-- /Main Wrapper -->

  <!-- jQuery -->
  <script src="assets/js/jquery-3.6.0.min.js"></script>

  <!-- Bootstrap Bundle JS -->
  <script src="assets/js/bootstrap.bundle.min.js"></script>

  <!-- Select2 JS -->
  <script src="assets/plugins/select2/js/select2.min.js"></script>

  <!-- Slick Slider JS -->
  <script src="assets/plugins/slick/slick.js"></script>

  <!-- Aos JS -->
  <script src="assets/plugins/aos/aos.js"></script>

  <!-- Custom JS -->
  <script src="assets/js/script.js"></script>

</body>

</html>
