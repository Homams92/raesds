<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'price',
        'thumbnail',
        'mil',
        'transmission',
        'seats',
        'fuel',
        'description',
        'status',
    ];

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}
