<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DriverIncident extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id','booking_id','incident_date','incident_type',
        'severity','financial_impact','reported_by','description','action_taken'
    ];

    // Incident belongs to a Customer
    public function customer()
    {
        return $this->belongsTo(Customers::class, 'customer_id');
    }

    // Incident belongs to a Booking
    public function booking()
    {
        return $this->belongsTo(Booking::class, 'booking_id');
    }
}
