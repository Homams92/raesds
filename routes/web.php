<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\GalleryController;
use App\Http\Controllers\BookingController;
use App\Exports\BookingExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\Frontend\CardController; // ✅ diperbaiki dari CarController
use App\Filament\Pages\Dashboard as CustomDashboard; // ✅ import custom dashboard kalau mau routing manual

Route::get('/export-bookings', function () {
    return Excel::download(new BookingExport, 'bookings.xlsx');
});

// Frontend routes
Route::get('/', [App\Http\Controllers\Frontend\HomepageController::class, 'index'])->name('homepage');
Route::get('service', [App\Http\Controllers\Frontend\ServiceController::class, 'index'])->name('layanan');
Route::get('cars', [CardController::class, 'index'])->name('car'); // ✅ pakai CardController
Route::get('car/{car:slug}', [CardController::class, 'show'])->name('car.show'); // ✅ pakai CardController
Route::get('contact', [App\Http\Controllers\Frontend\ContactController::class, 'index'])->name('contact');
Route::get('/galeri', [GalleryController::class, 'index'])->name('galeri');
Route::post('/booking', [BookingController::class, 'store'])->name('booking.store');

// Layanan spesifik
Route::get('/services/wedding', [ServiceController::class, 'wedding'])->name('services.wedding');
// Route::get('/services/city', [ServiceController::class, 'city'])->name('services.city');
Route::get('/services/airport', [ServiceController::class, 'airport'])->name('services.airport');
Route::get('/services/tour', [ServiceController::class, 'tour'])->name('services.tour');

// Route::get('/layanan', fn() => view('frontend.services.index'))->name('layanan');


