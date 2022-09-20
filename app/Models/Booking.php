<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'arrival_date',
        'booking_id',
        'name',
        'contact_number',
        'origin',
        'destination',
        'job_time',
        'passenger_count',
        'luggage_count',
        'car_type',
        'flight_number',
        'price',
        'status',
        'projected_price',
        'city',
    ];
}
