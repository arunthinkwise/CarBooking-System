<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customers extends Model
{
    protected $fillable = [
        'full_name',
        'email',
        'phone',
        'drivers_license',
        'license_expiry',
        'dob',
        'city',
        'country',
        'address',
        'notes',
    ];
}
