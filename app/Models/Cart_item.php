<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart_item extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_cart',
        'id_product',
        'product_title',
        'cuantity',
        'price',
        'img'
    ];

    public function cart()
    {
        return $this->belongsTo(Cart::class, 'id_cart');
    }

    public function getTotalPrice()
    {
        return $this->cuantity * $this->price;
    }
}
