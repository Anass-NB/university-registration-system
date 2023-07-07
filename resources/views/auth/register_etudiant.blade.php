<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <title>ESTFBS E-candidature </title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">

  <!-- Favicon -->
  <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/img/favicon_usms.ico') }}">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">

  <!-- Fontawesome CSS -->
  <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome/css/fontawesome.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome/css/all.min.css') }}">

  <!-- Main CSS -->
  <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/etudiant.css') }}">

</head>

<body class="account-page">

  <!-- Main Wrapper -->
  <div class="main-wrapper">


    <!-- Page Content -->
    <div class="bg-pattern-style bg-pattern-style-register">
      <div class="content">

        <!-- Register Content -->
        <div class="account-content">
          <div class="account-box">
            <div class="login-right">
              <div class="login-header">
                <h3><span>Espace</span> Etudiant</h3>
                <p class="text-muted">Créer nouveau compte</p>
              </div>

              <!-- Register Form -->
              <form action="{{ route('etudiant.register') }}" method="POST">
                @csrf
                <div class="row">
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label class="form-control-label">Nom</label>
                      <input required id="first-name" class="form-control @error('nom') is-invalid @enderror"
                        type="text" name="nom" value="{{ old('nom') }}" placeholder="النسب">
                      @error('nom')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                      @enderror
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label class="form-control-label">Prenom</label>
                      <input id="last-name" type="text" class="form-control @error('prenom') is-invalid @enderror"
                        name="prenom" required value="{{ old('prenom') }}" placeholder="الاسم">
                      @error('prenom')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                      @enderror
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label class="form-control-label">Email Addresse</label>
                  <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                    name="email" required value="{{ old('email') }}" placeholder="البريد إلكتروني">
                  @error('email')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
                </div>
                <div class="row">
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label class="form-control-label">Password</label>
                      <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                        name="password" required placeholder="كلمة السر">
                      @error('password')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                      @enderror
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label class="form-control-label">Confirm Password</label>
                      <input id="password-confirm" type="password"
                        class="form-control @error('password_confirmation') is-invalid @enderror" required
                        name="password_confirmation" placeholder="تأكيد كلمة المرور">
                      @error('password_confirmation')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                      @enderror
                    </div>
                  </div>
                </div>
                {{-- <div class="form-group">
                  <div class="form-check form-check-xs custom-checkbox">
                    <input type="checkbox" class="form-check-input" name="agreeCheckboxUser" id="agree_checkbox_user">
                    <label class="form-check-label" for="agree_checkbox_user">I agree to Mentoring</label> <a
                      tabindex="-1" href="javascript:void(0);">Privacy Policy</a> &amp; <a tabindex="-1"
                      href="javascript:void(0);"> Terms.</a>
                  </div>
                </div> --}}
                <button class="btn btn-primary login-btn" type="submit">Créer compte</button>
                <div class="account-footer text-center mt-3">
                  Déjà inscrit ? <a class="forgot-link mb-0" href="{{ route('login.etudiant') }}">CONNEXION</a>
                </div>
              </form>
              <!-- /Register Form -->

            </div>
          </div>
        </div>
        <!-- /Register Content -->

      </div>

    </div>
    <!-- /Page Content -->

  </div>
  <!-- /Main Wrapper -->

  <!-- jQuery -->
  <script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>

  <!-- Bootstrap Core JS -->
  <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>

  <!-- Custom JS -->
  <script src="{{ asset('assets/js/script.js') }}"></script>

</body>

</html>
