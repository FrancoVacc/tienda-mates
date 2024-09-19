<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    use HasFactory;
    protected $filables = ['categorie', 'img'];

    public function product()
    {
        return $this->hasMany('products', 'id_categorie', 'id');
    }
}
