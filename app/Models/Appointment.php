<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $fillable = [
        'customer_id',
        'vehicle_id',
        'appointment_date',
        'appointment_time',
        'notes',
        'status',
        'total_amount',
    ];

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }

    public function customer()
    {
        return $this->belongsTo(User::class, 'customer_id');
    }

    public function appointmentServices()
    {
        return $this->hasMany(AppointmentService::class);
    }

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }
}