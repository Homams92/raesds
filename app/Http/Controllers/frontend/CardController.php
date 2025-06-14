<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CardController extends Controller
{
    public function index ()
    {
      // Tampilkan hanya yang tersedia
      $cars = Car::where('status', 'tersedia')->get();
      return view('frontend.car', compact('cars'));
  }

    public function show(car $car) 
    {
      $related_cars = Car::where('id', '!=', $car->id)
                          ->where('status', 'tersedia')
                          ->get();

      return view('frontend.detail', compact('car', 'related_cars'));
  }
}
