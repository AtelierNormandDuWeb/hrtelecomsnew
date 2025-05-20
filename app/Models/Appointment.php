<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'company',
        'email',
        'phone',
        'appointment_date',
        'message',
        'is_confirmed',
        'google_event_id'
    ];

    protected $casts = [
        'appointment_date' => 'datetime',
        'is_confirmed' => 'boolean',
    ];
}