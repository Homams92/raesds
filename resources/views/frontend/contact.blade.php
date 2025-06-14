@extends('frontend.layout')

@section('content')

<!-- Hero Section -->
<section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('{{ asset('frontend/images/bg_3.jpg') }}'); background-size: cover; background-position: center;" data-stellar-background-ratio="0.5">
  <div class="overlay" style="background: linear-gradient(to right, rgba(0, 31, 63, 0.8), rgba(0, 45, 90, 0.8));"></div>
  <div class="container">
    <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
      <div class="col-md-9 pb-5 text-white">
        <p class="breadcrumbs">
          <span class="mr-2"><a href="{{ route('homepage') }}" class="text-white">Home <i class="ion-ios-arrow-forward"></i></a></span>
          <span>Kontak <i class="ion-ios-arrow-forward"></i></span>
        </p>
        <h1 class="mb-3">Kontak Kami</h1>
      </div>
    </div>
  </div>
</section>

<!-- Kontak & Maps -->
<section class="ftco-section contact-section bg-light py-5">
  <div class="container">
    <div class="row mb-5 justify-content-center text-center">
      <div class="col-md-8">
        <h2 class="mb-3 text-dark">Hubungi Kami</h2>
        <p class="text-dark">Anda dapat menghubungi kami melalui kontak yang tersedia atau mengunjungi lokasi kami secara langsung. Kami siap membantu Anda dengan pelayanan terbaik untuk segala kebutuhan atau pertanyaan.</p>
      </div>
    </div>
</div>
<div class="row mx-5">
  <!-- Kontak Info -->
  <div class="col-md-6 mb-4 ">
    <div class="bg-white p-4 rounded shadow mb-3 text-center">
      <h5>
        <i class="bi bi-geo-alt-fill text-success fs-6 me-2"></i>
        Alamat
      </h5>
      <p class="text-dark">Jl. Rsu DR. Slamet No.69, Sukakarya, Garut Kota, Garut, Jawa Barat 44151</p>
    </div>
    <div class="bg-white p-4 rounded shadow mb-3 text-center">
      <h5>
        <i class="bi bi-envelope-fill text-success fs-4 me-2"></i>
        Email
      </h5>
      <p><a href="mailto:info@sansauto.co.id">info@sansauto.co.id</a></p>
    </div>
    <div class="bg-white p-4 rounded shadow text-center">
      <h5>
        <i class="bi bi-whatsapp text-success fs-4 me-2"></i>
        Kontak
      </h5>
      <p><a href="https://wa.me/6287917867843" target="_blank">0879 1786 7843</a></p>
    </div>
  </div>

  <!-- Google Maps -->
  <div class="col-md-6 mb-4">
    <div class="rounded shadow overflow-hidden p-3 mx-3">
      <iframe width="100%" height="100%" style="min-height: 400px;" src="https://www.google.com/maps?q=PT.+SANS+AUTO+TRANSPORT+Jl.+Rsu+DR.+Slamet+No.69,+Sukakarya,+Garut+Kota,+Garut,+Jawa+Barat+44151&output=embed" frameborder="0" allowfullscreen></iframe>
    </div>
  </div>
</div>


    <!-- Form Kontak -->
    <div class="row justify-content-center mt-5">
      <div class="col-md-10">
        <div class="bg-white p-4 p-md-5 rounded shadow">
          <div class="services-wrap rounded-right w-100">
            <h3 class="heading-section text-center mb-4">Booking Layanan</h3>
            {{-- <form action="{{ route('booking.store') }}" method="POST">
                @csrf
                <input type="hidden" name="car_title" value="{{ $car->title }}"> --}}
            
                <div class="form-group">
                    <label for="customer_name">Nama:</label>
                    <input type="text" name="customer_name" class="form-control" required>
                </div>
            
                <div class="form-group">
                    <label for="customer_email">Email:</label>
                    <input type="email" name="customer_email" class="form-control" required>
                </div>
            
                <div class="form-group">
                    <label for="rental_start_date">Tanggal Pemesanan:</label>
                    <input type="date" name="rental_start_date" class="form-control" required>
                </div>
            
                <div class="form-group">
                    <label for="rental_end_date">Tanggal Selesai:</label>
                    <input type="date" name="rental_end_date" class="form-control" required>
                </div>
            
                <div class="form-group">
                    <label for="total_price">Total Harga:</label>
                    <input type="number" name="total_price" class="form-control" required>
                </div>
            
                <p class="text-center mt-5">
                    <button type="submit" class="btn btn-primary py-3 px-4">Pesan Sekarang</button>
                </p>
            </form>
        </div> 
        </div>
      </div>
    </div>

  </div>
</section>

@endsection
