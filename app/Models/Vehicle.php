<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    protected $fillable = [
        'customer_id',
        'make',
        'model',
        'year',
        'license_plate',
        'vin',
        'color',
        'mileage',
    ];

    public function owner()
    {
        return $this->belongsTo(User::class, 'customer_id');
    }

    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }
}