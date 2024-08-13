<?php

namespace App\Http\Controllers;

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
        $productos = Product::all();
        return view('web.shop', compact('productos'));
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
