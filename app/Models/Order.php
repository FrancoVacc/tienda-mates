<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'order_number',
        'id_user',
        'items',
        'delivery',
        'delivery_date',
        'track_link',
        'status',
        'price'
    ];
}
