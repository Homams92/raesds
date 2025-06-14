@extends('frontend.layout')

@section('content')

@if(session('success'))
<div id="notification" 
     class="fixed inset-0 flex items-center justify-center z-[9999] pointer-events-none">
  <div class="bg-green-700 text-white rounded-full px-8 py-4 shadow-lg pointer-events-auto max-w-xs text-center font-semibold transition-opacity duration-500 opacity-100">
    {{ session('success') }}
  </div>
</div>

<script>
  setTimeout(() => {
    const notif = document.getElementById('notification');
    if (notif) {
      notif.classList.add('opacity-0', 'transition-opacity', 'duration-500');
      setTimeout(() => notif.remove(), 500);
    }
  }, 4000);
</script>
@endif

<div class="hero-wrap ftco-degree-bg" style="background-image: url('{{ asset('frontend/images/bg_3.jpg') }}');"
    data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
      <div class="row no-gutters slider-text justify-content-start align-items-center justify-content-center">
        <div class="col-lg-8 ftco-animate">
          <div class="text w-100 text-center mb-md-5 pb-md-5">
            <h1 class="mb-4">Sewa Mobil  &amp; Mudah dan Cepat</h1>
            <p style="font-size: 18px;">Tempat ini memberikan kemudahan dalam menyewa mobil, dengan proses cepat dan tanpa ribet, sehingga Anda bisa menikmati perjalanan dengan nyaman</p>
            {{-- <a href="https://vimeo.com/45830194"
              class="icon-wrap popup-vimeo d-flex align-items-center mt-4 justify-content-center"> --}}
              {{-- <div class="icon d-flex align-items-center justify-content-center">
                <span class="ion-ios-play"></span>
              </div>
              <div class="heading-title ml-5">
                <span>Easy steps for renting a car</span>
              </div> --}}
            {{-- </a> --}}
          </div>
        </div>
      </div>
    </div>
  </div>
  <section class="ftco-section ftco-no-pt bg-light">
    <div class="container">
      <div class="row no-gutters">
        <div class="col-md-12	featured-top">
          <div class="row justify-content-center no-gutters">
            <div class="col-md-10 d-flex align-items-center">
              <div class="services-wrap rounded-right w-100">
                {{-- <h3 class="heading-section text-center mb-4">Better Way to Rent Your Perfect Cars</h3> --}}
                <div class="row d-flex mb-4">
                  <div class="col-md-4 d-flex align-self-stretch ftco-animate">
                    <div class="services w-100 text-center">
                      <div class="icon d-flex align-items-center justify-content-center"><span
                          class="fas fa-clock"></span></div>
                      <div class="text w-100">
                        <h3 class="heading mb-2">BERDIRI TAHUN 2017</h3>
                        <p>Sejak 2019, kami hadir sebagai solusi terpercaya dengan layanan profesional untuk semua kebutuhan transportasi Anda.</p>
                      </div>
                    </div>
                  </div>
                  {{-- <div class="col-md-4 d-flex align-self-stretch ftco-animate">
                    <div class="services w-100 text-center">
                      <div class="icon d-flex align-items-center justify-content-center"><span
                          class="flaticon-route"></span></div>
                      <div class="text w-100">
                        <h3 class="heading mb-2">Choose Your Pickup Location</h3>
                      </div>
                    </div>
                  </div> --}}
                  <div class="col-md-4 d-flex justify-content-center align-self-stretch ftco-animate">
                    <div class="services w-100 text-center">
                      <div class="icon d-flex align-items-center justify-content-center"><span
                          class="flaticon-rent"></span></div>
                      <div class="text w-100 text-center mx-auto m-auto">
                        <h3 class="heading mb-2 text-center">PILIHAN ARMADA LENGKAP</h3>
                        <p>Tersedia berbagai jenis kendaraan untuk memenuhi kebutuhan perjalanan pribadi hingga bisnis Anda.</p>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4 d-flex align-self-stretch ftco-animate">
                    <div class="services w-100 text-center">
                      <div class="icon d-flex align-items-center justify-content-center"><span
                          class="fas fa-handshake"></span></div>
                      <div class="text w-100">
                        <h3 class="heading mb-2">Mobil Andalan, Perjalanan Menyenangkan</h3>
                        <p>Armada terbaik kami siap menemani setiap perjalanan Anda dengan kenyamanan maksimal dan performa prima.</p>
                      </div>
                    </div>
                  </div>
                </div>
                <p class="text-center mt-5">
                  <a href="https://api.whatsapp.com/send?phone=62895340798342&text=hello+world"
                     class="btn text-center mx-auto m-auto ml-auto btn-primary py-3 px-4">
                     Sewa Mobil Impian Anda Sekarang
                  </a>
              </p>
              </div>
            </div>
          </div>
        </div>
      </div>
  </section>
  <section class="ftco-section ftco-no-pt bg-light">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-12 heading-section text-center ftco-animate mb-5">
          <span class="subheading">Layanan Kami</span>
          <h2 class="mb-2">Kendaraan Unggulan</h2>
          <p class="text-muted">Berbagai pilihan kendaraan terbaik kami siap menunjang kenyamanan dan kebutuhan perjalanan Anda.</p>
        </div>
      </div>      
      <div class="row">
        <div class="col-md-12">
          <div class="carousel-car owl-carousel">
            @foreach ($cars as $car)
            <div class="item">
              <div class="car-wrap rounded ftco-animate">
                <div class="img rounded d-flex align-items-end" style="background-image: url({{ Storage::url($car->thumbnail) }});">
                </div>
                <div class="text">
                  <h2 class="mb-0"><a href="#">{{ $car->title }} </a></h2>
                  <p>status: {{$car->status}}</p>
                  <div class="d-flex justify-content-between mb-3">
                      <p class="price">{{ 'Rp. ' . number_format($car->price, 0, ',', '.') }} <span>/hari</span></p>
                      <a href="{{ route('car.show', $car->slug) }}" class="btn btn-secondary py-2">Lihat Detail</a>
                  </div>
              </div>              
              </div>
            </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="ftco-section ftco-about">
    <div class="container ">
      <div class="row no-gutters">
        <div class="col-md-6 p-md-5 img img-2 d-flex justify-content-center align-items-center"
          style="background-image:  url('{{ asset('frontend/images/about.jpg') }}')">
        </div>
        <div class="col-md-6 wrap-about ftco-animate">
          <div class="heading-section heading-section-white pl-md-5">
            <span class="subheading">Tentang Kami</span>
            <h2 class="mb-4">Selamat Datang di SANS AUTO TRANS</h2>
            <p><strong> SANS AUTO TRANS</strong> adalah perusahaan yang bergerak di bidang jasa penyewaan mobil, berlokasi di <em>Perum Puri Permata Blok A.61, Garut</em>. Didirikan pada tahun 2017, kami hadir sebagai solusi transportasi yang mengutamakan kenyamanan, keamanan, dan pelayanan terbaik bagi pelanggan.</p>
    <p>Dengan beragam pilihan armada yang terawat dan siap pakai, kami siap mendukung kebutuhan mobilitas Anda — baik untuk keperluan pribadi, wisata, hingga perjalanan bisnis. Didukung oleh tim yang profesional dan berpengalaman, kami berkomitmen untuk selalu memberikan layanan yang cepat, mudah, dan terpercaya.</p>
    <p>Kepercayaan pelanggan adalah prioritas kami. Oleh karena itu, kami terus meningkatkan kualitas layanan agar setiap perjalanan bersama kami menjadi pengalaman yang menyenangkan dan bebas khawatir.</p>
            <p><a href=" {{route('car')}}" class="btn btn-primary py-3 px-4">Temukan Mobil yang Cocok untuk Anda</a></p>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="ftco-section">
    <div class="container">
      <div class="row justify-content-center mb-5">
        <div class="col-md-7 text-center heading-section ftco-animate">
          <span class="subheading">Services</span>
          <h2 class="mb-3">Our Latest Services</h2>
        </div>
      </div>
      <div class="row">
        <div class="col-md-3">
          <div class="services services-2 w-100 text-center">
            <div class="icon d-flex align-items-center justify-content-center"><span
                class="flaticon-wedding-car"></span></div>
            <div class="text w-100">
              <h3 class="heading mb-2">Wedding Ceremony</h3>
              <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="services services-2 w-100 text-center">
            <div class="icon d-flex align-items-center justify-content-center"><span
                class="flaticon-transportation"></span></div>
            <div class="text w-100">
              <h3 class="heading mb-2">City Transfer</h3>
              <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="services services-2 w-100 text-center">
            <div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-car"></span></div>
            <div class="text w-100">
              <h3 class="heading mb-2">Airport Transfer</h3>
              <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="services services-2 w-100 text-center">
            <div class="icon d-flex align-items-center justify-content-center"><span
                class="flaticon-transportation"></span></div>
            <div class="text w-100">
              <h3 class="heading mb-2">Whole City Tour</h3>
              <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="ftco-section ftco-intro" style="background-image: url('{{ asset('frontend/images/bg_3.jpg') }}">
    <div class="overlay"></div>
    <div class="container">
      <div class="row justify-content-end">
        <div class="col-md-6 heading-section heading-section-white ftco-animate">
          <h2 class="mb-3">Do You Want To Earn With Us? So Don't Be Late.</h2>
          <a href="{{ route('car')}}" class="btn btn-primary btn-lg">Sewa Mobil Pilihan Anda</a>
        </div>
      </div>
    </div>
  </section>
  <section class="ftco-section testimony-section bg-light">
    <div class="container">
      <div class="row justify-content-center mb-5">
        <div class="col-md-7 text-center heading-section ftco-animate">
          <span class="subheading">Testimonial</span>
          <h2 class="mb-3">Happy Clients</h2>
        </div>
      </div>
      <div class="row ftco-animate">
        <div class="col-md-12">
          <div class="carousel-testimony owl-carousel ftco-owl">
            <div class="item">
              <div class="testimony-wrap rounded text-center py-4 pb-5">
                <div class="user-img mb-2" style="background-image: url(images/person_1.jpg)">
                </div>
                <div class="text pt-4">
                  <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and
                    Consonantia, there live the blind texts.</p>
                  <p class="name">Roger Scott</p>
                  <span class="position">Marketing Manager</span>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="testimony-wrap rounded text-center py-4 pb-5">
                <div class="user-img mb-2" style="background-image: url(images/person_2.jpg)">
                </div>
                <div class="text pt-4">
                  <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and
                    Consonantia, there live the blind texts.</p>
                  <p class="name">Roger Scott</p>
                  <span class="position">Interface Designer</span>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="testimony-wrap rounded text-center py-4 pb-5">
                <div class="user-img mb-2" style="background-image: url(images/person_3.jpg)">
                </div>
                <div class="text pt-4">
                  <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and
                    Consonantia, there live the blind texts.</p>
                  <p class="name">Roger Scott</p>
                  <span class="position">UI Designer</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection