@extends('frontend.layout')

@section('content')

<section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image:  url('{{ asset('frontend/images/bg_3.jpg') }}')"
data-stellar-background-ratio="0.5">
<div class="overlay"></div>
<div class="container">
    <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
        <div class="col-md-9 ftco-animate pb-5">
            <p class="breadcrumbs"><span class="mr-2"><a href="{{ route('homepage')}}">Home <i
                            class="ion-ios-arrow-forward"></i></a></span> <span>Mobil <i
                        class="ion-ios-arrow-forward"></i></span></p>
            <h1 class="mb-3 bread">Pilih Mobil</h1>
        </div>
    </div>
</div>
</section>


<section class="ftco-section bg-light">
<div class="container">
    <div class="row">
        @foreach ($cars as $car)
        <div class="col-md-4">
            <div class="car-wrap rounded ftco-animate">
                <div class="img rounded d-flex align-items-end"
                    style="background-image: url({{ Storage::url($car->thumbnail) }});">
                </div>
                <div class="text">
                    <h2 class="mb-0"><a href="{{ route('car.show',$car->slug )}}">{{ $car->title }}</a></h2>
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
    <div class="row mt-5">
        <div class="col text-center">
            <div class="block-27">
                <ul>
                    <li><a href="#">&lt;</a></li>
                    <li class="active"><span>1</span></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li><a href="#">5</a></li>
                    <li><a href="#">&gt;</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
</section>

@endsection
