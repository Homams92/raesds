<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'car_title' => 'required|string',
            'customer_name' => 'required|string|max:255',
            'customer_phone' => 'required|string|max:255',
            'rental_start_date' => 'required|date',
            'rental_end_date' => 'required|date|after_or_equal:rental_start_date',
            'total_price' => 'required|numeric|min:0',
            'payment_proof' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'payment_method' => 'required|in:qris,cod',
        ]);

        $paymentProofPath = null;
        if ($request->hasFile('payment_proof')) {
            $paymentProofPath = $request->file('payment_proof')->store('payment_proofs', 'public');
        }
        Booking::create([
            'car_title' => $request->car_title,
            'customer_name' => $request->customer_name,
            'customer_phone' => $request->customer_phone,
            'rental_start_date' => $request->rental_start_date,
            'rental_end_date' => $request->rental_end_date,
            'total_price' => $request->total_price,
            'payment_status' => $request->payment_method === 'cod' ? 'pending' : 'paid',
            'payment_method' => $request->payment_method, // ✅ TAMBAH INI
            'payment_proof' => $paymentProofPath,
        ]);

        return redirect()->route('homepage')->with('success', 'Pemesanan berhasil!');
    }
}
