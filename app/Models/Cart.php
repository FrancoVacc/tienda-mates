<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $fillable = [
        'order_number',
        'id_user',
        'delivery',
        'track_link',
        'state',
        'delivery_date'
    ];

    public function items()
    {
        return $this->hasMany(Cart_item::class, 'id_cart');
    }
}
