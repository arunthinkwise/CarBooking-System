<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
    
            // Foreign keys
            $table->unsignedBigInteger('booking_id');
    
            // Payment details
            $table->date('payment_date');
            $table->decimal('amount', 10, 2);
    
            $table->enum('payment_method', ['Cash', 'Card', 'Bank Transfer', 'UPI'])
                  ->default('Cash');
    
            $table->string('transaction_id')->nullable();
            $table->text('notes')->nullable();
    
            $table->timestamps();
    
            // Foreign key relation
            $table->foreign('booking_id')->references('id')->on('bookings')->onDelete('cascade');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('payments');
    }
    


};
