@extends('frontend.layout')

@section('content')
<section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('{{asset('frontend/images/bg_3.jpg')}}');" data-stellar-background-ratio="0.5">
  <div class="overlay"></div>
  <div class="container">
    <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
      <div class="col-md-9 ftco-animate pb-5">
        <p class="breadcrumbs">
          <span class="mr-2"><a href="{{ route('homepage')}}">Home <i class="ion-ios-arrow-forward"></i></a></span>
          <span>Detail Mobil<i class="ion-ios-arrow-forward"></i></span>
        </p>
        <h1 class="mb-3 bread">Detail Mobil</h1>
      </div>
    </div>
  </div>
</section>

<section class="ftco-section ftco-car-details">
  <div class="container">
   <div class="row justify-content-center my-4">
  <div class="col-md-12">
    <div class="car-details text-center p-4">
      <!-- Gambar Mobil -->
        <div class="img rounded-4 shadow mb-4 mx-auto"
            style="background-image: url('{{ Storage::url($car->thumbnail) }}');
                    background-size: cover;
                    background-position: center;
                    height: 450px;
                    max-width: 100%;
                    width: 100%;">
        </div>
      <!-- Detail Mobil -->
      <div class="d-flex justify-content-center">
        <div class="p-4 rounded-4 shadow text-white" style="max-width: 450px; width: 100%; background-color:rgb(54, 107, 76);">
          <h2 class="mb-3 text-uppercase fw-bold text-white">{{ $car->title }}</h2>

          <!-- Harga -->
          <div class="d-flex align-items-center justify-content-between border-bottom pb-2 mb-3">
            <div class="text-start">
              <i class="fas fa-tags text-warning me-2"></i> <strong>Harga</strong>
            </div>
            <div class="text-end text-warning fs-5">
              Rp {{ number_format($car->price, 0, ',', '.') }} <span class="text-light fs-6">/hari</span>
            </div>
          </div>

          <!-- Status -->
          <div class="d-flex align-items-center justify-content-between">
            <div class="text-start">
              <i class="fas fa-info-circle text-info me-2"></i> <strong>Status</strong>
            </div>
            <div class="text-end">
              <span class="badge fs-6 px-3 py-1 
                {{ strtolower($car->status) == 'tersedia' ? 'bg-success' : 'bg-danger' }}">
                {{ $car->status }}
              </span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


    <div class="row">
      @foreach ([
        ['icon' => 'dashboard', 'label' => 'Jarak Tempuh', 'value' => $car->mil],
        ['icon' => 'pistons', 'label' => 'Transmisi', 'value' => $car->transmission],
        ['icon' => 'car-seat', 'label' => 'Kursi', 'value' => $car->seats],
        ['icon' => 'diesel', 'label' => 'Bahan Bakar', 'value' => $car->fuel]
      ] as $item)
      <div class="col-md d-flex align-self-stretch ftco-animate">
        <div class="media block-6 services">
          <div class="media-body py-md-4">
            <div class="d-flex mb-3 align-items-center">
              <div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-{{ $item['icon'] }}"></span></div>
              <div class="text">
                <h3 class="heading mb-0 pl-3">{{ $item['label'] }} <span>{{ $item['value'] }}</span></h3>
              </div>
            </div>
          </div>
        </div>
      </div>
      @endforeach
    </div>

    <div class="row">
      <div class="col-md-12 pills">
        <div class="bd-example bd-example-tabs">
          <div class="d-flex justify-content-center">
            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="pills-manufacturer-tab" data-toggle="pill" href="#pills-manufacturer" role="tab" aria-controls="pills-manufacturer" aria-expanded="true">Deskripsi</a>
              </li>
            </ul>
          </div>
          <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-manufacturer" role="tabpanel" aria-labelledby="pills-manufacturer-tab">
              <div class="text-end">
                <p class="fw-bold fs-4">{!! $car->description !!}</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="ftco-section mt-5 bg-light">
  <div class="container">
    <div class="row no-gutters">
      <div class="col-md-12 featured-top">
        <div class="row justify-content-center no-gutters">
          <div class="col-md-10 d-flex align-items-center">
            <div class="services-wrap rounded-right w-100">
              <h3 class="heading-section text-center mb-4">Siap Jalan-Jalan?</h3>
              <!-- Tiga Langkah -->
              <div class="row d-flex mb-4">
                @foreach ([
                  ['icon' => 'route', 'title' => 'Tentukan Lokasi Jemput'],
                  ['icon' => 'handshake', 'title' => 'Dapatkan Harga Terbaik'],
                  ['icon' => 'rent', 'title' => 'Booking Mobilmu Sekarang!']
                ] as $step)
                <div class="col-md-4 d-flex align-self-stretch ftco-animate">
                  <div class="services w-100 text-center">
                    <div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-{{ $step['icon'] }}"></span></div>
                    <div class="text w-100">
                      <h3 class="heading mb-2">{{ $step['title'] }}</h3>
                    </div>
                  </div>
                </div>
                @endforeach
              </div>
              <!-- Form Booking -->
              <div class="services-wrap bg-light text-dark py-5 px-4 rounded-4 shadow-lg border border-2 border-secondary-subtle">
                <h3 class="text-center mb-4 font-weight-bold text-dark">Booking Layanan</h3>
                    <form action="{{ route('booking.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="car_title" value="{{ $car->title }}">
                    <input type="hidden" id="price_per_day" value="{{ $car->price }}">
                    
                    <div class="mb-3">
                        <label for="customer_name" class="form-label fw-semibold">Nama:</label>
                        <input type="text" name="customer_name" class="form-control rounded-pill" required>
                    </div>

                   <div class="mb-3">
                        <label for="customer_phone" class="form-label fw-semibold">No. Telepon / WhatsApp:</label>
                        <input type="text" name="customer_phone" class="form-control rounded-pill" required>
                    </div>


                    <div class="row">
                        <div class="col-md-6 mb-3">
                        <label for="rental_start_date" class="form-label fw-semibold">Tanggal Pemesanan:</label>
                        <input type="date" name="rental_start_date" class="form-control rounded-pill" required>
                        </div>
                        <div class="col-md-6 mb-3">
                        <label for="rental_end_date" class="form-label fw-semibold">Tanggal Selesai:</label>
                        <input type="date" name="rental_end_date" class="form-control rounded-pill" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="total_price" class="form-label fw-semibold">Total Harga:</label>
                        <input type="text" name="total_price_display" id="total_price_display" class="form-control rounded-pill" readonly>
                        <input type="hidden" name="total_price" id="total_price">
                    </div>


                    <div class="mb-3">
                        <label for="payment_method" class="form-label fw-semibold">Metode Pembayaran:</label>
                        <select name="payment_method" id="payment_method" class="form-select rounded-pill" required onchange="togglePaymentProof()">
                        <option value="">-- Pilih Metode --</option>
                        <option value="qris">Bayar Sekarang (QRIS)</option>
                        <option value="cod">Bayar di Tempat</option>
                        </select>
                    </div>

                    <div id="payment_info" style="display: none;" class="mb-3">
                        <div class="mb-3">
                        <p><strong>QRIS atau No. Rekening:</strong></p>
                        <p>No. Rekening: 1234567890 (Bank ABC)</p>
                        <img src="{{ asset('frontend/images/qris_example.jpg') }}" alt="QRIS" style="width: 200px;">
                        </div>
                        <div class="mb-3" id="payment_proof_group">
                        <label for="payment_proof" class="form-label fw-semibold">Upload Bukti Pembayaran:</label>
                        <input type="file" name="payment_proof" class="form-control rounded-3" accept="image/*">
                        </div>
                    </div>

                    <div class="text-center mt-4">
                        <button type="submit" class="btn btn-gradient text-white btn-lg px-5 py-2 rounded-pill">Pesan Sekarang</button>
                    </div>
                    </form>

                    <script>
                    const startDateInput = document.querySelector('input[name="rental_start_date"]');
                    const endDateInput = document.querySelector('input[name="rental_end_date"]');
                    const totalPriceInput = document.getElementById('total_price');
                    const pricePerDay = parseInt(document.getElementById('price_per_day').value);

                    function isWeekend(date) {
                        const day = date.getDay();
                        return day === 0 || day === 6;
                    }

                    function getDailyPrice(date) {
                        return isWeekend(date) ? pricePerDay + 100000 : pricePerDay;
                    }

                    function updateTotalPrice() {
                        const start = new Date(startDateInput.value);
                        const end = new Date(endDateInput.value);

                        if (!isNaN(start) && !isNaN(end) && end >= start) {
                            let total = 0;
                            const tempDate = new Date(start);

                            while (tempDate <= end) {
                                total += getDailyPrice(tempDate);
                                tempDate.setDate(tempDate.getDate() + 1);
                            }

                            // Format harga dengan Rp
                            const formatted = 'Rp. ' + total.toLocaleString('id-ID');
                            document.getElementById('total_price_display').value = formatted;
                            document.getElementById('total_price').value = total;
                        } else {
                            document.getElementById('total_price_display').value = '';
                            document.getElementById('total_price').value = '';
                        }
                    }


                    startDateInput.addEventListener('change', updateTotalPrice);
                    endDateInput.addEventListener('change', updateTotalPrice);

                    function togglePaymentProof() {
                        const method = document.getElementById('payment_method').value;
                        const paymentInfo = document.getElementById('payment_info');
                        paymentInfo.style.display = method === 'qris' ? 'block' : 'none';
                    }
                    </script>

                    <style>
                    .btn-gradient {
                        background: linear-gradient(135deg, #007bff, #00c6ff);
                        border: none;
                        transition: all 0.3s ease;
                    }
                    .btn-gradient:hover {
                        background: linear-gradient(135deg, #0056b3, #0099cc);
                    }
                    </style>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="ftco-section ftco-no-pt">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-12 heading-section text-center ftco-animate mb-5">
        <span class="subheading">Choose Car</span>
        <h2 class="mb-2">Related Cars</h2>
      </div>
    </div>
    <div class="row">
      @foreach ($related_cars as $related_car)
      <div class="col-md-4">
        <div class="car-wrap rounded ftco-animate">
          <div class="img rounded d-flex align-items-end" style="background-image: url('{{ Storage::url($related_car->thumbnail) }}');"></div>
          <div class="text">
            <h2 class="mb-0"><a href="{{ route('car.show', $related_car->slug) }}">{{ $related_car->title}}</a></h2>
            <div class="d-flex mb-3">
              <p class="price ml-auto">{{ $related_car->price }} <span>/day</span></p>
            </div>
            <p class="d-flex mb-0 d-block">
              <a href="{{ route ('car.show', $related_car->slug) }}" class="btn btn-primary py-2 mr-1">Book now</a>
              <a href="{{ route ('car.show', $related_car->slug) }}" class="btn btn-secondary py-2 ml-1">Details</a>
            </p>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>
@endsection
