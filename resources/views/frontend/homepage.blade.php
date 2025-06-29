@extends('frontend.layout')

@section('content')

  @if(session('success'))
   <div id="notification"
    class="position-fixed top-50 start-50 translate-middle animate__animated animate__bounceIn"
    style="z-index: 1080;">
    <div class="alert alert-success alert-dismissible text-center fw-semibold rounded-pill px-4 py-3 shadow-lg m-0"
      role="alert">
      {{ session('success') }}
    </div>
  </div>
  @endif

  <div class="hero-wrap ftco-degree-bg" style="background-image: url('{{ asset('frontend/images/bf.png') }}');"
    data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
    <div class="row no-gutters slider-text justify-content-start align-items-center justify-content-center">
      <div class="col-lg-8 ftco-animate">
      <div class="text w-100 text-center mb-md-5 pb-md-5">
        <h1 class="mb-4">Sewa Mobil &amp; Mudah dan Cepat</h1>
        <p style="font-size: 18px;">Tempat ini memberikan kemudahan dalam menyewa mobil, dengan proses cepat dan tanpa
        ribet, sehingga Anda bisa menikmati perjalanan dengan nyaman</p>
      </div>
      </div>
    </div>
    </div>
  </div>
  <section class="ftco-section ftco-no-pt bg-light mb-0 pb-1">
    <div class="container">
    <div class="row no-gutters">
      <div class="col-md-12	featured-top">
      <div class="row justify-content-center no-gutters">
        <div class="col-md-10 d-flex align-items-center">
        <div class="services-wrap rounded-right w-100">
          <div class="row d-flex mb-4">
          <div class="col-md-4 d-flex align-self-stretch ftco-animate">
            <div class="services w-100 text-center">
            <div class="icon d-flex align-items-center justify-content-center"><span class="fas fa-clock"
              style="color:rgb(153, 68, 4)"></span></div>
            <div class="text w-100">
              <h3 class="heading mb-2">BERDIRI TAHUN 2017</h3>
              <p>Sejak 2019, kami hadir sebagai solusi terpercaya dengan layanan profesional untuk semua
              kebutuhan transportasi Anda.</p>
            </div>
            </div>
          </div>
          <div class="col-md-4 d-flex justify-content-center align-self-stretch ftco-animate">
            <div class="services w-100 text-center">
            <div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-rent"
              style="color:rgb(153, 68, 4)"></span></div>
            <div class="text w-100 text-center mx-auto m-auto">
              <h3 class="heading mb-2 text-center">PILIHAN ARMADA LENGKAP</h3>
              <p>Tersedia berbagai jenis kendaraan untuk memenuhi kebutuhan perjalanan pribadi hingga bisnis
              Anda.</p>
            </div>
            </div>
          </div>
          <div class="col-md-4 d-flex align-self-stretch ftco-animate">
            <div class="services w-100 text-center">
            <div class="icon d-flex align-items-center justify-content-center"><span class="fas fa-handshake"
              style="color:rgb(153, 68, 4)"></span></div>
            <div class="text w-100">
              <h3 class="heading mb-2">Mobil Andalan, Perjalanan Menyenangkan</h3>
              <p>Armada terbaik kami siap menemani setiap perjalanan Anda dengan kenyamanan maksimal dan
              performa prima.</p>
            </div>
            </div>
          </div>
          </div>
        </div>
        </div>
      </div>
      </div>
    </div>
  </section>
  <section class="ftco-section pt-5" style="background-color: #f8f9fa;">
    <div class="container p-4 shadow rounded" style="background-color: #ffffff;">
    <div class="row">
      <!-- Keterangan -->
      <div class="col-md-6 mb-4">
      <h5 class="mb-3 font-weight-bold">📌 KETERANGAN:</h5>
      <div class="p-3 rounded" style="background-color: #f5f5f5; border-left: 4px solid #333;">
        <p class="text-dark mb-0">
        Sistem pemakaian pertanggal mulai pukul <strong>00.00 sampai 24.00</strong>.<br>
        (Mulai dipakai kapan saja, berakhir pukul 00.00 tetap dihitung 1 hari).
        </p>
      </div>
      </div>
      <div class="col-md-6">
      <h5 class="mb-3 font-weight-bold ">📄 SYARAT:</h5>
      <div class="btn-group mb-3" role="group">
        <button type="button" class="btn btn-outline-dark" onclick="showSyarat('umum')">Umum</button>
        <button type="button" class="btn btn-outline-dark" onclick="showSyarat('mahasiswa')">Mahasiswa</button>
      </div>
      <div id="syarat-umum" class="syarat-box p-3 rounded"
        style="display: none; background-color: #f5f5f5; border-left: 4px solid #333;">
        <ul class="list-unstyled mb-0 text-dark">
        <li>- KTP</li>
        <li>- Kartu Keluarga (KK)</li>
        <li>- SIM A</li>
        <li>- NPWP</li>
        <li>- Menitipkan motor & STNK atau deposit uang</li>
        </ul>
      </div>
      <div id="syarat-mahasiswa" class="syarat-box p-3 rounded"
        style="display: none; background-color: #f5f5f5; border-left: 4px solid #333;">
        <ul class="list-unstyled mb-0 text-dark">
        <li>- KTP</li>
        <li>- Kartu Keluarga (KK)</li>
        <li>- SIM A</li>
        <li>- Kartu Tanda Mahasiswa (KTM)</li>
        <li>- KTP Orang Tua & Penjamin</li>
        <li>- Menitipkan motor & STNK atau deposit uang</li>
        </ul>
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
      <p class="text-muted">Berbagai pilihan kendaraan terbaik kami siap menunjang kenyamanan dan kebutuhan perjalanan
        Anda.</p>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
      <div class="carousel-car owl-carousel">
        @foreach ($cars as $car)
      <div class="item">
      <div class="car-wrap rounded ftco-animate">
        <div class="img rounded d-flex align-items-end"
        style="background-image: url({{ Storage::url($car->thumbnail) }});">
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
  <section class="ftco-section ftco-about" style="background-color: #1c2833; color: #ffffff; border-radius: 12px;">
    <div class="container">
    <div class="row no-gutters">
      <div class="col-md-6 p-md-5 img img-2 d-flex justify-content-center align-items-center"
      style="background-image:  url('{{ asset('frontend/images/about.jpg') }}')">
      </div>
      <div class="col-md-6 wrap-about ftco-animate">
      <div class="heading-section heading-section-white pl-md-5">
        <span class="subheading">Tentang Kami</span>
        <h2 class="mb-4">Selamat Datang di SANS AUTO TRANS</h2>
        <p><strong> SANS AUTO TRANS</strong> adalah perusahaan yang bergerak di bidang jasa penyewaan mobil, berlokasi
        di <em>Perum Puri Permata Blok A.61, Garut</em>. Didirikan pada tahun 2017, kami hadir sebagai solusi
        transportasi yang mengutamakan kenyamanan, keamanan, dan pelayanan terbaik bagi pelanggan.</p>
        <p>Dengan beragam pilihan armada yang terawat dan siap pakai, kami siap mendukung kebutuhan mobilitas Anda —
        baik untuk keperluan pribadi, wisata, hingga perjalanan bisnis. Didukung oleh tim yang profesional dan
        berpengalaman, kami berkomitmen untuk selalu memberikan layanan yang cepat, mudah, dan terpercaya.</p>
        <p>Kepercayaan pelanggan adalah prioritas kami. Oleh karena itu, kami terus meningkatkan kualitas layanan agar
        setiap perjalanan bersama kami menjadi pengalaman yang menyenangkan dan bebas khawatir.</p>
        <a href="{{ route('car') }}" class="btn text-white btn-lg rounded-pill px-4 py-3"
        style="background-color: #994404; border: none;">
        temukan mobil yang lebih cocok
        </a>
      </div>
      </div>
    </div>
    </div>
  </section>
  <section class="ftco-section bg-light py-5">
      <div class="container">
          <div class="row justify-content-center mb-5">
              <div class="col-md-8 text-center heading-section ftco-animate">
                  <span class="subheading text-uppercase text-primary" style="letter-spacing: 2px;">Layanan Kami</span>
                  <h2 class="mb-3 text-dark font-weight-bold">Layanan yang Menyesuaikan Anda</h2>
                  <p class="text-muted lead">Kami hadir untuk memberikan pengalaman terbaik dalam setiap perjalanan.</p>
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
  {{-- <section class="ftco-section ftco-intro" style="background-image: url('{{ asset('frontend/images/bg_3.jpg') }}">
    <div class="overlay"></div>
    <div class="container">
    <div class="row justify-content-end">
      <div class="col-md-6 heading-section heading-section-white ftco-animate">
      <h2 class="mb-3">Do You Want To Earn With Us? So Don't Be Late.</h2>
      <a href="{{ route('car')}}" class="btn btn-primary btn-lg">Sewa Mobil Pilihan Anda</a>
      </div>
    </div>
    </div>
  </section> --}}
  <section class="ftco-section bg-dark text-white py-5">
    <div class="container">
    <div class="row justify-content-center m-auto">
      <div class="col-md-10 col-lg-8">
      <div class="rounded shadow-lg" style="background: linear-gradient(135deg, #2c3e50, #34495e);">
        <div class="services-wrap w-100 px-4 py-5"
        style="background-color: #1c2833; color: #ffffff; border-radius: 10px;">
        <h3 class="heading-section text-center mb-4 text-white">💬 Konsultasi Layanan</h3>
        <p class="text-light text-center mb-4">Isi form di bawah untuk berkonsultasi langsung via WhatsApp</p>

        <form id="konsultasiForm" onsubmit="return kirimWhatsAppKonsultasi();">
          <div class="form-row">
          <div class="form-group col-md-6">
            <label for="layanan" class="font-weight-bold text-white">Pilih Layanan:</label>
            <select class="form-control border-dark" id="layanan" required>
            <option value="">-- Pilih --</option>
            <option value="Sewa Rental Mobil Acara Pernikahan">Acara Pernikahan</option>
            <option value="Paket Wisata">Paket Wisata</option>
            <option value="Antar Jemput Bandara / Stasiun">Antar Jemput Bandara / Stasiun</option>
            </select>
          </div>
          <div class="form-group col-md-6">
            <label for="mobil" class="font-weight-bold text-white">Mobil yang Diinginkan:</label>
            <input type="text" id="mobil" class="form-control border-dark" required>
          </div>
          </div>

          <div class="form-row">
          <div class="form-group col-md-6">
            <label for="nama_konsultasi" class="font-weight-bold text-white">Nama Anda:</label>
            <input type="text" id="nama_konsultasi" class="form-control border-dark" required>
          </div>
          <div class="form-group col-md-6">
            <label for="wa_konsultasi" class="font-weight-bold text-white">Nomor WhatsApp:</label>
            <input type="text" id="wa_konsultasi" class="form-control border-dark" required
            placeholder="Contoh: 083812345678">
          </div>
          </div>

          <div class="form-row">
          <div class="form-group col-md-4">
            <label for="lama" class="font-weight-bold text-white">Lama Sewa (Hari):</label>
            <input type="number" id="lama" class="form-control border-dark" required>
          </div>
          <div class="form-group col-md-4">
            <label for="tanggal" class="font-weight-bold text-white">Tanggal Sewa:</label>
            <input type="date" id="tanggal" class="form-control border-dark" required>
          </div>
          <div class="form-group col-md-4">
            <label for="jam" class="font-weight-bold text-white">Jam Mulai:</label>
            <input type="time" id="jam" class="form-control border-dark" required>
          </div>
          </div>

          <div class="text-center mt-4">
          <button type="submit" class="btn btn-success px-5 py-3 shadow">
            <i class="fab fa-whatsapp mr-2"></i> Konsultasi via WhatsApp
          </button>
          </div>
        </form>

        </div>
      </div>
      </div>
    </div>

  </section>
  <section class="py-5">
    <div class="container">
      <div class="row justify-content-center mb-5">
        <div class="col-lg-8 text-center">
          <span class="badge bg-primary-subtle text-primary mb-3 fs-6 ">Testimoni Pelanggan</span>
          <h2 class="mb-3 text-dark display-5 fw-bold">Apa Kata Mereka tentang Layanan Kami?</h2>
        </div>
      </div>
      <div class="row g-4">
        <div class="col-lg-4 col-md-6">
          <div class="card border-0 shadow-lg h-100 animate__animated animate__fadeIn" data-bs-animation-delay="0.1s">
            <div class="card-body text-center py-4">
              <div class="rounded-circle mx-auto mb-3 border border-2 border-primary" style="width: 120px; height: 120px; background-color: #e9ecef;background-image: url('{{ asset('frontend/images/about.jpg') }}'); background-size: cover;"></div>
              <div class="d-flex justify-content-center mb-3">
                <i class="bi bi-quote text-primary fs-3"></i>
              </div>
              <p class="card-text text-muted mb-4 fs-5">“Layanan cepat, harga bersahabat, dan mobil bersih banget. Udah langganan tiap ke Garut!”</p>
              <h5 class="card-title text-dark mb-0 fw-semibold">Dewi Setiani</h5>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6">
          <div class="card border-0 shadow-lg h-100 animate__animated animate__fadeIn" data-bs-animation-delay="0.2s">
            <div class="card-body text-center py-4">
              <div class="rounded-circle mx-auto mb-3 border border-2 border-primary" style="width: 120px; height: 120px; background-color: #e9ecef; background-image: url('{{ asset('frontend/images/about.jpg') }}'); background-size: cover;"></div>
              <div class="d-flex justify-content-center mb-3">
                <i class="bi bi-quote text-primary fs-3"></i>
              </div>
              <p class="card-text text-muted mb-4 fs-5">“Booking via webnya gampang banget, tinggal klik langsung dapat. Nggak ribet!”</p>
              <h5 class="card-title text-dark mb-0 fw-semibold">Dika Saputra</h5>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6">
          <div class="card border-0 shadow-lg h-100 animate__animated animate__fadeIn" data-bs-animation-delay="0.3s">
            <div class="card-body text-center py-4">
              <div class="rounded-circle mx-auto mb-3 border border-2 border-primary" style="width: 120px; height: 120px; background-color: #e9ecef; background-image: url('{{ asset('frontend/images/about.jpg') }}'); background-size: cover;"></div>
              <div class="d-flex justify-content-center mb-3">
                <i class="bi bi-quote text-primary fs-3"></i>
              </div>
              <p class="card-text text-muted mb-4 fs-5">“Support CS-nya gercep banget. Mobil diantar ke lokasi sesuai waktu. Keren sih!”</p>
              <h5 class="card-title text-dark mb-0 fw-semibold">Muhammad Akrom</h5>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection