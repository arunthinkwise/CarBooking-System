<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
        'customer_id',
        'vehicle_id',
        'pickup_datetime',
        'return_datetime',
        'pickup_location',
        'return_location',
        'rental_type',
        'mileage_package',
        'security_deposit',
        'premium_insurance',
        'gps',
        'child_seat',
        'additional_driver',
        'airport_pickup',
        'one_way_rental',
        'base_rate',
        'addons_total',
        'grand_total',
        'status',
        'notes'
    ];

    // Relationships
    public function customer(){
        return $this->belongsTo(Customers::class, 'customer_id');
    }
    public function vehicle() {
        return $this->belongsTo(FleetModel::class, 'vehicle_id');
    }
}
