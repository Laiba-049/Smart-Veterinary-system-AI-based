<?php
// app/Models/Appointment.php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use Notifiable;
    protected $fillable = [
        'doctor_id',
        'patient_name',
        'patient_phone',
        'appointment_date',
        'appointment_time',
        'disease_description',
        'status',
        'images',
        'video',
        'doctor_comment',
        'prescription',
    ];

    protected $casts = [
        'images' => 'array', // auto convert JSON to array
    ];

    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }
}
