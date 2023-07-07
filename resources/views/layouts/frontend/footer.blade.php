<footer class="footer footer-eight">

  <!-- Footer Top -->
  <div class="footer-top aos" data-aos="fade-up">
    <div class="container-fluid">
      <div class="row">

        <div class="col-lg-3 col-md-6">
          <!-- Footer Widget -->
          <div class="footer-widget footer-about">
            <div class="footer-logo">
              <img style="box-shadow: 20px 16px 5px 0px #2f266b;"
                src="{{ asset('assets/img/logos/estfbs-305x107 2.png') }}" alt="logo">
            </div>
            <div class="footer-about-content">
              <p>Ecole Supérieure de Technologie – Fkih Ben Salah </p>
            </div>
          </div>
          <!-- /Footer Widget -->
        </div>

        <div class="col-lg-3 col-md-6">
          <!-- Footer Widget -->
          <div class="footer-widget footer-menu">
            <h2 class="footer-title">CONNEXION</h2>
            <ul>
              <li><a href="{{ route('etudiant.loginForm') }}">Etudiant</a></li>
              <li><a href="{{ route('usms.loginForm') }}">Enseignant</a></li>
              <li><a href="{{ route('usms.loginForm') }}">Administrateur</a></li>
            </ul>
          </div>
          <!-- /Footer Widget -->
        </div>

        <div class="col-lg-3 col-md-6">
          <!-- Footer Widget -->
          <div class="footer-widget footer-menu">
            <h2 class="footer-title">Liens outils</h2>
            <ul>
              <li><a href="{{ url('/') }}">Accueil</a></li>
              <li><a href="{{ route('etudiant.registerForm') }}">Créer nouveau compte</a></li>
              <li><a href="#">Contact</a></li>
            </ul>
          </div>
          <!-- /Footer Widget -->
        </div>

        <div class="col-lg-3 col-md-6">
          <!-- Footer Widget -->
          <div id="contact" class="footer-widget footer-contact">
            <h2 class="footer-title">Contact </h2>
            <div class="footer-contact-info">
              <div class="footer-address">
                <p> Hay Tighnari, Route nationale N11 de Casablanca commune de Fkih Ben Salah, <br> Boite Postale 336
                </p>
              </div>
              <p>
                05 23 43 46 66 - 05 23 43 49 99
              </p>
              <p class="mb-0">
                estfbs@usms.ma
              </p>
            </div>
          </div>
          <!-- /Footer Widget -->
        </div>

      </div>
    </div>
  </div>
  <!-- /Footer Top -->

  <!-- Footer Bottom -->
  <div class="footer-bottom">
    <div class="container-fluid">
      <!-- Copyright -->
      <div class="copyright">
        <div class="row">
          <div class="col-md-6">
            <div class="copyright-text">
              <p class="mb-0">&copy; 2023 EST-FBS . <span style="color: #FF9800;">Créé par Anass Nabil & Soufiane
                  EL
                  Jadi
                </span>
              </p>
            </div>
          </div>
          <div class="col-md-6">
            <div class="social-icon text-md-end">
              {{-- <ul>
                <li>
                  <a href="#" target="_blank"><i class="fab fa-instagram"></i></a>
                </li>
                <li>
                  <a href="#" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                </li>
                <li>
                  <a href="#" target="_blank"><i class="fab fa-twitter"></i> </a>
                </li>
              </ul> --}}
            </div>
          </div>
        </div>
      </div>
      <!-- /Copyright -->
    </div>
  </div>
  <!-- /Footer Bottom -->

</footer>
