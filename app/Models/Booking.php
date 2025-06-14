<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
        'car_title',
        'customer_name',
        'customer_phone',
        'rental_start_date',
        'rental_end_date',
        'total_price',
        'payment_status',
        'payment_proof',
        'payment_method',
    ];
     public function car()
    {
        return $this->belongsTo(Car::class);
    }
}
