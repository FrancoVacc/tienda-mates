<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product_Categorie extends Model
{
    use HasFactory;
    protected $filable = ['id_product', 'id_categorie'];
}
