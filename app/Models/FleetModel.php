<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FleetModel extends Model
{
    protected $table = 'vehicles';

    protected $fillable = [
        'make',
        'model',
        'year',
        'license_plate',
        'category',
        'color',
        'mileage',
        'fuel_type',
        'transmission',
        'seats',
        'miles_per_day',
        'daily_rate',
        'hourly_rate',
        'weekly_rate',
        'monthly_rate',
        'weekend_rate',
        'extra_mileage_charge',
        'status',
        'image_url',
        'notes',
    ];
}
