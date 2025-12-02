<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FinancialModel extends Model
{
    protected $table = 'payments'; 

    protected $fillable = [
        'booking_id',
        'payment_date',
        'amount',
        'payment_method',
        'transaction_id',
        'notes'
    ];
}
