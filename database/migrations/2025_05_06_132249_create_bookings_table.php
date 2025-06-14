<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->string('car_title');               // Tambahkan
            $table->string('customer_name');           // Ubah dari 'name'
            $table->string('customer_phone');          // Tambahkan
            $table->date('rental_start_date');         // Ubah dari 'start_date'
            $table->date('rental_end_date');           // Ubah dari 'end_date'
            $table->decimal('total_price', 10, 2);
            $table->string('payment_status')->default('pending');
            $table->string('payment_proof')->nullable(); // Optional
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
