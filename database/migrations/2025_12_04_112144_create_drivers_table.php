<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDriversTable extends Migration
{
    public function up()
    {
        Schema::create('drivers', function (Blueprint $table) {
            $table->id();
            $table->string('name');                   // Driver Name
            $table->string('email')->nullable();      // Optional
            $table->string('phone')->nullable();      // Contact
            $table->string('license_number')->unique(); // Driving License No.
            $table->date('license_expiry')->nullable();
            $table->string('address')->nullable();
            $table->string('status')->default('Active'); // Active / Inactive
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('drivers');
    }
}
