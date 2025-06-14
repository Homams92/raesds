@extends('frontend.layout') {{-- pastikan ini sesuai dengan layout utama --}}

@section('content')
<section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image:  url('{{ asset('frontend/images/bg_3.jpg') }}')"
data-stellar-background-ratio="0.5">
<div class="overlay"></div>
<div class="container">
    <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
        <div class="col-md-9 ftco-animate pb-5">
            <p class="breadcrumbs"><span class="mr-2"><a href="{{ route('homepage')}}">Home <i
                            class="ion-ios-arrow-forward"></i></a></span> <span>Galeri <i
                        class="ion-ios-arrow-forward"></i></span></p>
            <h1 class="mb-3 bread">Galeri Testimoni</h1>
        </div>
    </div>
</div>
</section>
<section class="ftco-section bg-light">
    <div class="container">
        <div class="row justify-content-center pb-4">
            <div class="col-md-12 heading-section text-center ftco-animate">
                <h2 class="mb-4">Galeri Portofolio Kami</h2>
                <p class="lead">Lihat pengalaman pelanggan kami melalui galeri foto di bawah ini. Kami bangga telah melayani berbagai kebutuhan sewa kendaraan, mulai dari liburan keluarga hingga perjalanan bisnis. Setiap foto mencerminkan komitmen kami untuk memberikan layanan terbaik dan kendaraan berkualitas.</p>
            </div>
        </div>
        <div class="row">
            @forelse ($portfolios as $item)
                <div class="col-md-4 ftco-animate">
                    <div class="project-wrap">
                        <div class="img" style="background-image: url('{{ asset('storage/' . $item->image) }}'); height: 250px; background-size: cover; background-position: center;">
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-md-12 text-center">
                    <p>Belum ada testimoni dalam galeri.</p>
                </div>
            @endforelse
        </div>
    </div>
</section>
@endsection
