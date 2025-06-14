<x-filament::page>
    {{-- STATISTIK --}}
    <div class="w-full -mx-4 px-4 overflow-x-auto">
        <div class="flex gap-4 mb-6 min-w-max">
            <x-filament::card class="min-w-[200px]">
                <h2 class="text-sm text-gray-500">Total Mobil</h2>
                <p class="text-2xl font-bold text-gray-900">{{ $totalCars }}</p>
            </x-filament::card>

            <x-filament::card class="min-w-[200px]">
                <h2 class="text-sm text-gray-500">Total Booking</h2>
                <p class="text-2xl font-bold text-gray-900">{{ $totalBookings }}</p>
            </x-filament::card>
            <x-filament::card class="min-w-[200px]">
                <h2 class="text-sm text-gray-500">Mobil Terlaris</h2>
                <p class="text-lg font-bold text-blue-600">
                    {{ $mostBookedCar->name ?? '-' }}
                    <span class="text-sm text-gray-500">({{ $mostBookedCar->bookings_count ?? 0 }}x)</span>
                </p>
            </x-filament::card>

            <x-filament::card class="min-w-[200px]">
                <h2 class="text-sm text-gray-500">Total Pendapatan</h2>
                <p class="text-2xl font-bold text-gray-900">Rp {{ number_format($totalRevenue, 0, ',', '.') }}</p>
            </x-filament::card>
        </div>
    </div>
    {{-- GRAFIK --}}
    <x-filament::card class="mb-6">
        <h3 class="text-lg font-semibold mb-4">Tren Booking per Bulan</h3>
        <canvas id="bookingChart" height="100"></canvas>
    </x-filament::card>
    {{-- MOBIL TERPOPULER --}}
    <x-filament::card class="mb-6">
        <h3 class="text-lg font-semibold mb-4">5 Mobil Terpopuler</h3>
        <ul class="list-disc pl-5 text-sm text-gray-800">
            @forelse($topCars as $car)
                <li>{{ $car->name }} <span class="text-gray-500">({{ $car->bookings_count }} booking)</span></li>
            @empty
                <li>Tidak ada data.</li>
            @endforelse
        </ul>
    </x-filament::card>
    {{-- TABEL BOOKING TERBARU --}}
    <x-filament::card>
          <h3 class="text-lg font-semibold mb-4">Booking Terbaru</h3>
    <div class="overflow-x-auto">
        <table class="table-fixed w-full text-sm text-left border-separate border-spacing-y-2">
            <thead class="bg-gray-100 text-gray-600">
                <tr>
                    <th class="w-1/4 px-4 py-2">Nama</th>
                    <th class="w-1/4 px-4 py-2">Mobil</th>
                    <th class="w-1/4 px-4 py-2">Tanggal</th>
                    <th class="w-1/4 px-4 py-2">Total Harga</th>
                </tr>
            </thead>
            <tbody class="text-gray-800">
                @forelse($latestBookings as $booking)
                    <tr class="text-gray-800">
                        <td class="py-2">{{ $booking->customer_name }}</td>
                        <td class="py-2">{{ $booking->car_title ?? '-' }}</td>
                        <td class="py-2">{{ \Carbon\Carbon::parse($booking->rental_start_date)->format('d M Y') }}</td>
                        <td class="py-2">Rp {{ number_format($booking->total_price, 0, ',', '.') }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="py-2 text-center text-gray-500">Tidak ada booking terbaru</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </x-filament::card>
    {{-- SCRIPT CHART --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('bookingChart').getContext('2d');
        new Chart(ctx, {
            type: 'line',
            data: {
                labels: {!! json_encode($chartLabels) !!},
                datasets: [{
                    label: 'Jumlah Booking',
                    data: {!! json_encode($chartData) !!},
                    backgroundColor: 'rgba(59, 130, 246, 0.2)',
                    borderColor: '#3B82F6',
                    borderWidth: 2,
                    tension: 0.4,
                    fill: true
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: { stepSize: 1 }
                    }
                }
            }
        });
    </script>
</x-filament::page>
