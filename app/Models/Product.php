<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['titulo', 'slug', 'price', 'description'];

    public function category()
    {
        return $this->belongsTo(Categorie::class, 'id_categorie');
    }
}
