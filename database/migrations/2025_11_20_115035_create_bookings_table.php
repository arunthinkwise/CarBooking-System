<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();

            // Foreign Keys
            $table->foreignId('customer_id')->constrained()->cascadeOnDelete();
            $table->foreignId('vehicle_id')->constrained()->cascadeOnDelete();

            // Dates
            $table->dateTime('pickup_datetime');
            $table->dateTime('return_datetime');

            // Locations
            $table->string('pickup_location')->nullable();
            $table->string('return_location')->nullable();

            // Pricing / Packages
            $table->enum('rental_type', ['daily', 'weekly', 'monthly']);
            $table->enum('mileage_package', ['limited', 'unlimited']);

            $table->integer('security_deposit')->default(0);

            // Optional Add-ons
            $table->boolean('premium_insurance')->default(false);
            $table->boolean('gps')->default(false);
            $table->boolean('child_seat')->default(false);
            $table->boolean('additional_driver')->default(false);

            // Special Circumstances
            $table->boolean('airport_pickup')->default(false);
            $table->boolean('one_way_rental')->default(false);

            // Price
            $table->decimal('base_rate', 10, 2)->default(0);
            $table->decimal('addons_total', 10, 2)->default(0);
            $table->decimal('grand_total', 10, 2)->default(0);

            // Status
            $table->enum('status', ['active', 'completed', 'cancelled'])->default('active');

            $table->text('notes')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
