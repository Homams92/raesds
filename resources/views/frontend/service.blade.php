@extends('frontend.layout')

@section('content')

  <section class="hero-wrap hero-wrap-2 js-fullheight"
    style="background-image:  url('{{ asset('frontend/images/bg_3.jpg') }}')" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
    <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
      <div class="col-md-9 ftco-animate pb-5">
      <p class="breadcrumbs">
        <span class="mr-2"><a href="{{ route('homepage')}}">Home <i class="ion-ios-arrow-forward"></i></a></span>
        <span>Layanan <i class="ion-ios-arrow-forward"></i></span>
      </p>
      <h1 class="mb-3 bread">Layanan Kami</h1>
      </div>
    </div>
    </div>
  </section>

  <section class="ftco-section bg-light py-5">
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-md-8 text-center heading-section ftco-animate">
                <span class="subheading text-uppercase text-primary" style="letter-spacing: 2px;">Layanan Kami</span>
                <h2 class="mb-3 text-dark font-weight-bold">Solusi Premium untuk Kebutuhan Anda</h2>
                <p class="text-muted lead">Nikmati layanan berkualitas tinggi yang dirancang untuk kenyamanan dan kepuasan Anda.</p>
            </div>
        </div>
        <div class="row g-4">
            <!-- Paket Pernikahan -->
            <div class="col-md-4 col-sm-6 mb-4">
                <a href="{{ route('services.wedding') }}"
                   class="services services-2 d-flex flex-column justify-content-center align-items-center text-center block rounded shadow-sm bg-white h-100 p-4 ftco-animate"
                   style="transition: all 0.4s ease; background: linear-gradient(145deg, #ffffff, #f9f9f9); border: 1px solid #e0e0e0;"
                   onmouseover="this.style.transform='translateY(-5px)'; this.style.boxShadow='0 12px 24px rgba(0,0,0,0.1)'; this.querySelector('.icon').style.background='linear-gradient(145deg, #d4af37, #b89729)'; this.querySelector('.icon i').style.color='#ffffff';"
                   onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 4px 8px rgba(0,0,0,0.05)'; this.querySelector('.icon').style.background='linear-gradient(145deg, #f9f9f9, #e0e0e0)'; this.querySelector('.icon i').style.color='#d4af37';">
                    <div class="icon d-flex justify-content-center align-items-center mb-3 rounded-circle"
                         style="width: 70px; height: 70px; background: linear-gradient(145deg, #f9f9f9, #e0e0e0); box-shadow: 0 4px 8px rgba(0,0,0,0.1); transition: all 0.4s ease;">
                        <i class="fas fa-heart" style="font-size: 2rem; color: #d4af37;"></i>
                    </div>
                    <div class="text w-100">
                        <h3 class="heading mb-2 text-dark font-weight-bold" style="font-size: 1.25rem;">Paket Pernikahan</h3>
                        <p class="text-muted small mb-0">Wujudkan hari spesial Anda dengan layanan pernikahan eksklusif kami.</p>
                    </div>
                </a>
            </div>

            <!-- Paket Wisata -->
            <div class="col-md-4 col-sm-6 mb-4">
                <a href="{{ route('services.tour') }}"
                   class="services services-2 d-flex flex-column justify-content-center align-items-center text-center block rounded shadow-sm bg-white h-100 p-4 ftco-animate"
                   style="transition: all 0.4s ease; background: linear-gradient(145deg, #ffffff, #f9f9f9); border: 1px solid #e0e0e0;"
                   onmouseover="this.style.transform='translateY(-5px)'; this.style.boxShadow='0 12px 24px rgba(0,0,0,0.1)'; this.querySelector('.icon').style.background='linear-gradient(145deg, #1e88e5, #1565c0)'; this.querySelector('.icon i').style.color='#ffffff';"
                   onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 4px 8px rgba(0,0,0,0.05)'; this.querySelector('.icon').style.background='linear-gradient(145deg, #f9f9f9, #e0e0e0)'; this.querySelector('.icon i').style.color='#1e88e5';">
                    <div class="icon d-flex justify-content-center align-items-center mb-3 rounded-circle"
                         style="width: 70px; height: 70px; background: linear-gradient(145deg, #f9f9f9, #e0e0e0); box-shadow: 0 4px 8px rgba(0,0,0,0.1); transition: all 0.4s ease;">
                        <i class="fas fa-map-marked-alt" style="font-size: 2rem; color: #1e88e5;"></i>
                    </div>
                    <div class="text w-100">
                        <h3 class="heading mb-2 text-dark font-weight-bold" style="font-size: 1.25rem;">Paket Wisata</h3>
                        <p class="text-muted small mb-0">Jelajahi destinasi impian dengan paket wisata yang fleksibel.</p>
                    </div>
                </a>
            </div>

            <!-- Antar Jemput Bandara -->
            <div class="col-md-4 col-sm-6 mb-4">
                <a href="{{ route('services.airport') }}"
                   class="services services-2 d-flex flex-column justify-content-center align-items-center text-center block rounded shadow-sm bg-white h-100 p-4 ftco-animate"
                   style="transition: all 0.4s ease; background: linear-gradient(145deg, #ffffff, #f9f9f9); border: 1px solid #e0e0e0;"
                   onmouseover="this.style.transform='translateY(-5px)'; this.style.boxShadow='0 12px 24px rgba(0,0,0,0.1)'; this.querySelector('.icon').style.background='linear-gradient(145deg, #43a047, #2e7d32)'; this.querySelector('.icon i').style.color='#ffffff';"
                   onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 4px 8px rgba(0,0,0,0.05)'; this.querySelector('.icon').style.background='linear-gradient(145deg, #f9f9f9, #e0e0e0)'; this.querySelector('.icon i').style.color='#43a047';">
                    <div class="icon d-flex justify-content-center align-items-center mb-3 rounded-circle"
                         style="width: 70px; height: 70px; background: linear-gradient(145deg, #f9f9f9, #e0e0e0); box-shadow: 0 4px 8px rgba(0,0,0,0.1); transition: all 0.4s ease;">
                        <i class="fas fa-plane" style="font-size: 2rem; color: #43a047;"></i>
                    </div>
                    <div class="text w-100">
                        <h3 class="heading mb-2 text-dark font-weight-bold" style="font-size: 1.25rem;">Antar Jemput Bandara</h3>
                        <p class="text-muted small mb-0">Perjalanan bandara yang nyaman dengan layanan profesional kami.</p>
                    </div>
                </a>
            </div>
        </div>
    </div>
</section>
@endsection