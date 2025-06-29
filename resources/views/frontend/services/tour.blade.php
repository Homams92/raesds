@extends('frontend.layout')

@section('content')
<section class="hero-wrap hero-wrap-2 js-fullheight"
         style="background-image: url('{{ asset('frontend/images/bg_3.jpg') }}'); background-size: cover; background-position: center;"
         data-stellar-background-ratio="0.5">
  <div class="overlay"
       style="background: linear-gradient(to right, rgba(0, 31, 63, 0.8), rgba(0, 45, 90, 0.8));"></div>
  <div class="container">
    <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
      <div class="col-md-9 pb-5 text-white">
        <p class="breadcrumbs">
          <span class="mr-2"><a href="{{ route('layanan') }}" class="text-white">Layanan <i class="ion-ios-arrow-forward"></i></a></span>
          <span>Paket Wisata <i class="ion-ios-arrow-forward"></i></span>
        </p>
        <h1 class="mb-3">Paket Wisata</h1>
      </div>
    </div>
  </div>
</section>

<section class="ftco-section bg-light">
  <div class="container">
    <div class="row justify-content-center">

      {{-- Jika ada detail layanan --}}
      @isset($serviceDetail)
      <div class="col-md-6 col-lg-5 mb-5">
        <div class="p-4 rounded-4 shadow text-white"
             style="background: linear-gradient(135deg, #2c3e50, #34495e);">
          @if($serviceDetail->thumbnail)
          <img src="{{ asset('storage/' . $serviceDetail->thumbnail) }}" class="img-fluid rounded mb-3"
               alt="{{ $serviceDetail->title }}">
          @endif

          <h5 class="mb-3 text-uppercase fw-bold">{{ $serviceDetail->title }}</h5>

          <div class="d-flex justify-content-between border-bottom pb-2 mb-3">
            <strong>Harga:</strong>
            <span class="text-warning">Rp {{ number_format($serviceDetail->price, 0, ',', '.') }}</span>
          </div>

          <div class="d-flex justify-content-between">
            <strong>Kategori:</strong>
            <span class="badge bg-primary text-capitalize">{{ $serviceDetail->category }}</span>
          </div>
        </div>
      </div>

      <div class="row justify-content-center mt-5">
        <div class="col-lg-10">
          <div class="bg-white border-start border-5 border-primary shadow-sm rounded-4 p-4">
            <h3 class="fw-bold text-center mb-4">Tentang Layanan Ini</h3>
            <p class="text-dark fs-5 lh-lg" style="text-align: justify;">
              {!! nl2br(e($serviceDetail->description)) !!}
            </p>
          </div>
        </div>
      </div>
      @endisset

      {{-- Jika tidak ada parameter id, tampilkan semua --}}
      @empty($serviceDetail)
      @forelse ($services as $service)
      <div class="col-md-4 mb-4">
        <div class="car-wrap rounded ftco-animate shadow-sm bg-white">
          <div class="img rounded d-flex align-items-end"
               style="background-image: url('{{ Storage::url($service->thumbnail) }}'); height: 200px; background-size: cover;">
          </div>
          <div class="text p-3">
            <h2 class="mb-2">
              <a href="{{ route('services.tour') }}?id={{ $service->id }}">{{ $service->title }}</a>
            </h2>
            <p>Kategori: {{ ucfirst($service->category) }}</p>
            <div class="d-flex justify-content-between align-items-center">
              <p class="price mb-0">
                Rp {{ number_format($service->price, 0, ',', '.') }} <span>/paket</span>
              </p>
              <a href="{{ route('services.tour') }}?id={{ $service->id }}" class="btn btn-sm btn-primary">Lihat Detail</a>
            </div>
          </div>
        </div>
      </div>
      @empty
      <div class="col-12 text-center text-muted">Belum ada layanan paket wisata yang tersedia.</div>
      @endforelse
      @endempty
    </div>
  </div>
</section>
@endsection