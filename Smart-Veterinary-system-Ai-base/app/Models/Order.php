<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'order_no',
        'animal_id',
        'buyer_id',
        'seller_id',
        'name',
        'email',
        'mobile',
        'alternate_mobile',
        'address',
        'address_2',
        'expectations',
        'when_needed',
        'animal_price',
        'delivery_charges',
    ];

    public function animal()
    {
        return $this->belongsTo(Animal::class);
    }

    public function buyer()
    {
        return $this->belongsTo(User::class, 'buyer_id');
    }
}
