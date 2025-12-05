<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDriverIncidentsTable extends Migration
{
    public function up()
    {
        Schema::create('driver_incidents', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('driver_id');  // Driver Name
            $table->unsignedBigInteger('booking_id')->nullable();  
            $table->date('incident_date');
            $table->string('incident_type');
            $table->string('severity')->default('Minor');
            $table->decimal('financial_impact', 10,2)->default(0);
            $table->string('reported_by')->nullable();
            $table->text('description');
            $table->text('action_taken')->nullable();
            $table->timestamps();

            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
            $table->foreign('booking_id')->references('id')->on('bookings')->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::dropIfExists('driver_incidents');
    }
}
