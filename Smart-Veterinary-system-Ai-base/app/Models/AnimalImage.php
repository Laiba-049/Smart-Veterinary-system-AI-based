<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AnimalImage extends Model
{
    protected $fillable = ['animal_id', 'image_path'];

    public function animal()
    {
        return $this->belongsTo(Animal::class);
    }
}
