<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();

            $table->string('make');
            $table->string('model');
            $table->year('year');
            $table->string('license_plate')->unique();

            $table->enum('category', [
                'Economy', 'Standard', 'Luxury', 'SUV', 'Van', 'Truck'
            ]);

            $table->string('color')->nullable();
            $table->integer('mileage')->default(0);

            $table->enum('fuel_type', [
                'Gasoline', 'Diesel', 'Electric', 'Hybrid'
            ]);

            $table->enum('transmission', ['Automatic', 'Manual']);
            $table->integer('seats')->default(4);

            $table->integer('miles_per_day')->default(0); // 0 = unlimited

            // Rates
            $table->decimal('daily_rate', 10, 2)->default(0);
            $table->decimal('hourly_rate', 10, 2)->default(0);
            $table->decimal('weekly_rate', 10, 2)->default(0);
            $table->decimal('monthly_rate', 10, 2)->default(0);
            $table->decimal('weekend_rate', 10, 2)->default(0);
            $table->decimal('extra_mileage_charge', 10, 2)->default(0);

            $table->enum('status', ['Available', 'Unavailable', 'In Service'])
                  ->default('Available');

            $table->string('image_url')->nullable();

            $table->text('notes')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('vehicles');
    }
};
