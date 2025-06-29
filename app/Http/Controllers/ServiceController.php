<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;

class ServiceController extends Controller
{
    public function wedding(Request $request)
    {
        if ($request->has('id')) {
            $service = Service::where('category', 'wedding')
                        ->where('id', $request->id)
                        ->where('status', 'tersedia')
                        ->first();

            if (!$service) {
                return redirect()->route('services.wedding')->with('error', 'Layanan tidak ditemukan.');
            }

            return view('frontend.services.wedding', ['serviceDetail' => $service]);
        }

        $services = Service::where('category', 'wedding')
            ->where('status', 'tersedia')
            ->latest()
            ->get();

        return view('frontend.services.wedding', compact('services'));
    }

    public function tour(Request $request)
    {
        if ($request->has('id')) {
            $service = Service::where('category', 'tour')
                        ->where('id', $request->id)
                        ->where('status', 'tersedia')
                        ->first();

            if (!$service) {
                return redirect()->route('services.tour')->with('error', 'Layanan tidak ditemukan.');
            }

            return view('frontend.services.tour', ['serviceDetail' => $service]);
        }

        $services = Service::where('category', 'tour')
            ->where('status', 'tersedia')
            ->latest()
            ->get();

        return view('frontend.services.tour', compact('services'));
    }

    public function city(Request $request)
    {
        if ($request->has('id')) {
            $service = Service::where('category', 'city')
                        ->where('id', $request->id)
                        ->where('status', 'tersedia')
                        ->first();

            if (!$service) {
                return redirect()->route('services.city')->with('error', 'Layanan tidak ditemukan.');
            }

            return view('frontend.services.city', ['serviceDetail' => $service]);
        }

        $services = Service::where('category', 'city')
            ->where('status', 'tersedia')
            ->latest()
            ->get();

        return view('frontend.services.city', compact('services'));
    }

    public function airport(Request $request)
    {
        if ($request->has('id')) {
            $service = Service::where('category', 'airport')
                        ->where('id', $request->id)
                        ->where('status', 'tersedia')
                        ->first();

            if (!$service) {
                return redirect()->route('services.airport')->with('error', 'Layanan tidak ditemukan.');
            }

            return view('frontend.services.airport', ['serviceDetail' => $service]);
        }

        $services = Service::where('category', 'airport')
            ->where('status', 'tersedia')
            ->latest()
            ->get();

        return view('frontend.services.airport', compact('services'));
    }
}