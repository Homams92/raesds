<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\GalleryController;
use App\Http\Controllers\BookingController;
use App\Exports\BookingExport;
use Maatwebsite\Excel\Facades\Excel;

Route::get('/export-bookings', function () {
    return Excel::download(new BookingExport, 'bookings.xlsx');
});




Route::get('/', [App\Http\Controllers\Frontend\HomepageController::class, 'index'])->name('homepage');
Route::get('service', [App\Http\Controllers\Frontend\ServiceController::class, 'index'])->name('layanan');
Route::get('cars', [App\Http\Controllers\Frontend\CardController::class, 'index'])->name('car');
Route::get('car/{car:slug}', [App\Http\Controllers\Frontend\CardController::class, 'show'])->name('car.show');
Route::get('contact', [App\Http\Controllers\Frontend\ContactController::class, 'index'])->name('contact');
Route::get('/galeri', [GalleryController::class, 'index'])->name('galeri');
Route::post('/booking', [BookingController::class, 'store'])->name('booking.store');







