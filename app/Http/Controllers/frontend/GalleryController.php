<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Portfolio;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index()
    {
        // Mengambil semua data portfolio dari database
        $portfolios = Portfolio::all();

        // Mengirim data portfolios ke tampilan galeri
        return view('frontend.galeri', compact('portfolios'));
    }
}
