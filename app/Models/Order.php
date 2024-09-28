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
        'id_delivery',
        'delivery_date',
        'track_link',
        'id_status',
        'price'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function deliveryInfo()
    {
        return $this->belongsTo(Delivery::class, 'id_delivery', 'id');
    }

    public function statusInfo()
    {
        return $this->belongsTo(Status::class, 'id_status', 'id');
    }
}
