<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Product;
use Illuminate\Http\Request;

class clientController extends Controller
{
    public function index()
    {
        return view('web.home');
    }
    public function about()
    {
        return view('web.about');
    }
    public function contact()
    {
        return view('web.contact');
    }
    public function shop()
    {
        $categories = Categorie::all();
        $productos = Product::paginate(10);
        return view('web.shop', compact('productos', 'categories'));
    }
    public function category(string $id)
    {
        $categories = Categorie::all();
        $productos = Product::paginate(10)->where('id_categorie', '=', $id);
        return view('web.shop_category', compact('productos', 'categories'));
    }
    public function product(string $id)
    {
        $product = Product::FindOrFail($id);
        return view('web.product', compact('product'));
    }

    public function cart()
    {
        return view('web.cart');
    }
}
