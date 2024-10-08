<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;
    protected  $fillable = [
        'id_user',
        'country',
        'province',
        'city',
        'street',
        'number',
        'postcode',
        'description'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
