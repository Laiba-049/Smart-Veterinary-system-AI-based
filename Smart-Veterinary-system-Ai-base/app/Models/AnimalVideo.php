<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AnimalVideo extends Model
{
    protected $fillable = ['animal_id', 'video_path'];

    public function animal()
    {
        return $this->belongsTo(Animal::class);
    }
}
