@extends('frontend.layout')

@php
  use Illuminate\Support\Str;
@endphp

@section('content')
  <section class="hero-wrap hero-wrap-2 js-fullheight"
    style="background-image: url('{{ asset('frontend/images/bg_3.jpg') }}'); background-size: cover; background-position: center;"
    data-stellar-background-ratio="0.5">
    <div class="overlay" style="background: linear-gradient(to right, rgba(0, 31, 63, 0.8), rgba(0, 45, 90, 0.8));"></div>
    <div class="container">
    <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
      <div class="col-md-9 pb-5 text-white">
      <p class="breadcrumbs">
        <span class="mr-2"><a href="{{ route('layanan') }}" class="text-white">Layanan <i
          class="ion-ios-arrow-forward"></i></a></span>
        <span>Wedding <i class="ion-ios-arrow-forward"></i></span>
      </p>
      <h1 class="mb-3">Layanan Wedding</h1>
      </div>
    </div>
    </div>
  </section>

  <section class="ftco-section bg-light">
    <div class="container">
    <div class="row justify-content-center">

      {{-- Jika ada detail layanan --}}
      @isset($serviceDetail)
      {{-- Kartu Detail --}}
      <div class="col-md-6 col-lg-5 mb-5">
      <div class="p-4 rounded-4 shadow text-white w-100"
      style="background: linear-gradient(135deg, #2c3e50, #34495e);">
      @if($serviceDetail->thumbnail)
      <img src="{{ asset('storage/' . $serviceDetail->thumbnail) }}" class="img-fluid rounded mb-3"
      alt="{{ $serviceDetail->title }}">
      @endif

      <h5 class="mb-3 text-uppercase fw-bold text-white">{{ $serviceDetail->title }}</h5>

      <!-- Harga -->
      <div class="d-flex align-items-center justify-content-between border-bottom pb-2 mb-3">
      <div class="text-start">
        <i class="fas fa-tags text-warning me-2"></i> <strong>Harga</strong>
      </div>
      <div class="text-end text-warning fs-6">
        Rp {{ number_format($serviceDetail->price, 0, ',', '.') }}
      </div>
      </div>

      <!-- Kategori -->
      <div class="d-flex align-items-center justify-content-between">
      <div class="text-start">
        <i class="fas fa-car text-info me-2"></i> <strong>Kategori</strong>
      </div>
      <div class="text-end">
        <span class="badge bg-primary px-3 py-1 text-white text-capitalize">{{ $serviceDetail->category }}</span>
      </div>
      </div>
      </div>
      </div>

      {{-- Deskripsi (DI LUAR CARD) --}}
      <{{-- Deskripsi (Lebih Berwarna & Lebih Jelas) --}} <div class="row justify-content-center mt-5">
      <div class="col-lg-10">
      <div class="bd-example bd-example-tabs">


      <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade show active" id="pills-deskripsi" role="tabpanel"
        aria-labelledby="pills-deskripsi-tab">
        <div class="mx-auto shadow-sm rounded-4 bg-white border-start border-5 border-primary"
        style="max-width: 920px; padding: 45px 35px;">
        <h3 class="fw-bold text-dark mb-4 text-center" style="font-size: 1.8rem;">
        Tentang Layanan Ini
        </h3>

        <p class="text-dark fs-5 lh-lg" style="text-align: justify; font-weight: 500;">
        {!! nl2br(e($serviceDetail->description)) !!}
        </p>
        </div>
        </div>
      </div>
      </div>
      </div>
    </div>

    @endisset

    {{-- Jika tidak ada parameter id, tampilkan semua --}}
    @empty($serviceDetail)
      @forelse ($services as $service)
      <div class="col-md-4">
      <div class="car-wrap rounded ftco-animate">
      <div class="img rounded d-flex align-items-end"
      style="background-image: url('{{ Storage::url($service->thumbnail) }}');">
      </div>
      <div class="text">
      <h2 class="mb-0">
      <a href="{{ route('services.wedding') }}?id={{ $service->id }}">{{ $service->title }}</a>
      </h2>
      <p>Kategori: {{ ucfirst($service->category) }}</p>
      <div class="d-flex justify-content-between mb-3">
      <p class="price">
        Rp {{ number_format($service->price, 0, ',', '.') }} <span>/paket</span>
      </p>
      <a href="{{ route('services.wedding') }}?id={{ $service->id }}" class="btn btn-secondary py-2">Lihat
        Detail</a>
      </div>
      </div>
      </div>
      </div>
      @empty
      <div class="col-12 text-center text-muted">Belum ada layanan wedding.</div>
      @endforelse
    @endempty

    </div>
    </div>
  </section>

@endsection