<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use App\Models\Car;
use App\Models\Booking;
use Illuminate\Support\Facades\DB;

class Dashboard extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-chart-bar';
    protected static string $view = 'filament.pages.dashboard';

    public function getViewData(): array
    {
        $monthlyData = Booking::selectRaw('MONTH(rental_start_date) as month, COUNT(*) as total')
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        $labels = [];
        $data = [];

        foreach (range(1, 12) as $month) {
            $labels[] = \Carbon\Carbon::create()->month($month)->format('M');
            $data[] = $monthlyData->firstWhere('month', $month)?->total ?? 0;
        }

        $topCars = Car::withCount('bookings')->orderByDesc('bookings_count')->take(5)->get();
        $mostBookedCar = $topCars->first();

        return [
            'totalCars' => Car::count(),
            'totalBookings' => Booking::count(),
            'totalRevenue' => Booking::sum('total_price'),
            'latestBookings' => Booking::with('car')->latest()->take(5)->get(),
            'chartLabels' => $labels,
            'chartData' => $data,
            'topCars' => $topCars,
            'mostBookedCar' => $mostBookedCar,
        ];
    }
}
