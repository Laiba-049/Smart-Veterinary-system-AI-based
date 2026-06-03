<?php
namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Doctor extends Authenticatable
{
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'specialization',
        'experience',
        'photo',
        'bio'
    ];

    protected $hidden = ['password'];
    public function appointments()
{
    return $this->hasMany(\App\Models\Appointment::class);
}

}
