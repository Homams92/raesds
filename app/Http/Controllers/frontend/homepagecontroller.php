<?php

namespace App\Http\Controllers\frontend;

use App\Models\car;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class homepagecontroller extends Controller
{
    public function index ()
    {
        $cars = car::latest()->get();

        return view ('frontend.homepage', compact('cars'));
    }
}
