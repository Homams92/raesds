<!DOCTYPE html>
<html lang="en">

<head>
  <title>SansAutoTrans</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap"
    rel="stylesheet">

  <link rel="stylesheet" href="{{ asset('frontend/css/open-iconic-bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('frontend/css/animate.css') }}">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  

  <!-- Link ke Flaticon CDN -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flaticon/3.0.0/font/flaticon.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  

  <link rel="stylesheet" href="{{ asset('frontend/css/owl.carousel.min.css') }}">
  <link rel="stylesheet" href="{{ asset('frontend/css/owl.theme.default.min.css') }}">
  <link rel="stylesheet" href="{{ asset('frontend/css/magnific-popup.css') }}">

  <link rel="stylesheet" href="{{ asset('frontend/css/aos.css') }}">

  <link rel="stylesheet" href="{{ asset('frontend/css/ionicons.min.css') }}">

  <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap-datepicker.css') }}">
  <link rel="stylesheet" href="{{ asset('frontend/css/jquery.timepicker.css') }}">

  <link rel="stylesheet" href="{{ asset('frontend/css/flaticon.css') }}">
  <link rel="stylesheet" href="{{ asset('frontend/css/icomoon.css') }}">
  <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">
</head>

<body>

  <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
      <a class="navbar-brand" href="{{ route('homepage') }}">
        Sans<span style="color: #994404;">AutoTrans</span>
      </a>

      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
        aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="oi oi-menu"></span> Menu
      </button>

      <div class="collapse navbar-collapse" id="ftco-nav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a href="{{ route('homepage') }}"
              class="nav-link text-white fw-bold {{ request()->is('/') ? 'border-bottom border-5 border-warning pb-1' : '' }}">Home</a>
          </li>
          <li class="nav-item">
            <a href="{{ route('layanan') }}"
              class="nav-link text-white fw-bold {{ request()->routeIs('layanan') ? 'border-bottom border-5 border-warning pb-1' : '' }}">Layanan</a>
          </li>
          <li class="nav-item">
            <a href="{{ route('car') }}"
              class="nav-link text-white fw-bold {{ request()->routeIs('car') || request()->is('car/*') ? 'border-bottom border-5 border-warning pb-1' : '' }}">Daftar
              Mobil</a>
          </li>
          <li class="nav-item">
            <a href="{{ route('galeri') }}"
              class="nav-link text-white fw-bold {{ request()->is('galeri') ? 'border-bottom border-5 border-warning pb-1' : '' }}">Galeri
              Testimoni</a>
          </li>
          <li class="nav-item">
            <a href="{{ route('contact') }}"
              class="nav-link text-white fw-bold {{ request()->is('contact') ? 'border-bottom border-5 border-warning pb-1' : '' }}">Kontak
              Kami</a>
          </li>
        </ul>


      </div>
    </div>
  </nav>
  <!-- END nav -->

  @yield('content')

  <footer class="ftco-footer ftco-bg-dark ftco-section">
    <div class="container">
      <div class="row mb-5">
        <div class="col-md">
          <div class="ftco-footer-widget mb-4">
            <h2 class="ftco-heading-2"><a href="#" class="logo">SANS<span style="color: #994404;">AUTOTRANS</span></a>
            </h2>
            <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
              <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
              <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
              <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
            </ul>
          </div>
        </div>
        <div class="col-md">
          <div class="ftco-footer-widget mb-4 ml-md-5">
            <h2 class="ftco-heading-2">INFORMASI</h2>
            <ul class="list-unstyled">
              <li><a href="service" class="py-2 d-block">Layanan</a></li>
              <li><a href="car" class="py-2 d-block">Daftar Mobil</a></li>
              <li><a href="galeri" class="py-2 d-block">Galeri Testimoni</a></li>
              <li><a href="contact" class="py-2 d-block">Kontak Kami</a></li>
            </ul>
          </div>
        </div>
        <div class="col-md">
          <div class="ftco-footer-widget mb-4">
            <h2 class="ftco-heading-2">CUSTOMER SUPPORT</h2>
            <form id="whatsapp-form" class="row no-gutters align-items-stretch">
              <div class="col-8 pr-1">
                <input type="text" id="nama" class="form-control h-100" placeholder="Masukkan Nama Anda" required>
              </div>
              <div class="col-4 pl-1">
                <a href="#" onclick="kirimWhatsApp()"
                  class="btn btn-success h-100 w-100 d-flex align-items-center justify-content-center">
                  <i class="fab fa-whatsapp mr-2"></i> Kirim
                </a>
              </div>
            </form>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12 text-center">

          <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            Copyright &copy;
            <script>document.write(new Date().getFullYear());</script> All rights reserved | SANSAUTOTRANS
          </p>
        </div>
      </div>
    </div>
  </footer>



  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
      <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
      <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10"
        stroke="#F96D00" />
    </svg></div>


  <script src="{{ asset('frontend/js/jquery.min.js') }}"></script>
  <script src="{{ asset('frontend/js/jquery-migrate-3.0.1.min.js') }}"></script>
  <script src="{{ asset('frontend/js/popper.min.js') }}"></script>
  <script src="{{ asset('frontend/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('fronted/js/jquery.easing.1.3.js') }}"></script>
  <script src="{{ asset('frontend/js/jquery.waypoints.min.js') }}"></script>
  <script src="{{ asset('frontend/js/jquery.stellar.min.js') }} "></script>
  <script src="{{ asset('frontend/js/owl.carousel.min.js') }}"></script>
  <script src="{{ asset('frontend/js/jquery.magnific-popup.min.js') }}"></script>
  <script src="{{ asset('frontend/js/aos.js') }}"></script>
  <script src="{{ asset('frontend/js/jquery.animateNumber.min.js') }}"></script>
  <script src="{{ asset('frontend/js/bootstrap-datepicker.js') }}"></script>
  <script src="{{ asset('frontend/js/jquery.timepicker.min.js') }}"></script>
  <script src="{{ asset('frontend/js/scrollax.min.js') }}"></script>
  <script
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="{{ asset('frontend/js/google-map.js') }}"></script>
  <script src="{{ asset('frontend/js/main.js') }}"></script>

</body>

</html>