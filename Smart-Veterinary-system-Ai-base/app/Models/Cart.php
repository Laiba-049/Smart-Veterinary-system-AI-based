<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = ['user_id', 'animal_id'];

    public function animal()
    {
        return $this->belongsTo(Animal::class);
    }
}
