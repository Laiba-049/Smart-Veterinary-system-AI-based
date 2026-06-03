<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    protected $fillable = [
        'user_id',
        'title',
        'description',
        'price',
        'age',
        'gender',
        'breed',
        'location',
        'status',
    ];

    public function images()
    {
        return $this->hasMany(AnimalImage::class);
    }

    public function videos()
    {
        return $this->hasMany(AnimalVideo::class);
    }

    public function seller()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}
