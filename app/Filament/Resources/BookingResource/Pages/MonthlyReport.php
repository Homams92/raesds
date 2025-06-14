<?php

namespace App\Filament\Resources\BookingResource\Pages;

use App\Filament\Resources\BookingResource;
use Filament\Resources\Pages\Page; // ✅ perbaikan di sini
use App\Models\Booking;

class MonthlyReport extends Page
{
    protected static string $resource = BookingResource::class;
    protected static string $view = 'filament.monthly-report';

    public $monthlyBookings;

    public function mount(): void
    {
        $this->monthlyBookings = Booking::selectRaw('YEAR(created_at) as year, MONTH(created_at) as month, COUNT(*) as total_bookings, SUM(total_price) as total_revenue')
    ->groupByRaw('YEAR(created_at), MONTH(created_at)')
    ->orderBy('year', 'desc')
    ->orderBy('month', 'desc')
    ->get();
    }
}
