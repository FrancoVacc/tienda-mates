<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Cart_item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function addToCart(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'title' => 'required',
            'price' => 'required',
            'cuantity' => 'required',
        ]);
        $userId = Auth::id();

        $cart = Cart::firstOrCreate(['id_user' => $userId]);


        $cartItem = Cart_item::create([
            'id_cart' => $cart->id,
            'id_product' => $request->id,
            'product_title' => $request->title,
            'cuantity' => $request->cuantity,
            'price' => $request->price,
            'img' => $request->img
        ]);


        return redirect('producto/' . $request->id);
    }

    public function cartShow()
    {
        $userId = Auth::id();

        $cart = Cart::where('id_user', $userId)->with('items')->first();

        if ($cart) {
            $totalPrice = $cart->items->sum(function ($item) {
                return $item->getTotalPrice();
            });

            return view('web.cart', compact('cart', 'totalPrice'));
        }

        return view('web.cart');
    }

    public function itemDelete($id)
    {
        Cart_item::destroy($id);
        return redirect('/cart');
    }
    public function itemUpdate(Request $request, $id)
    {
        $item = Cart_item::findOrFail($id);

        $request->validate([
            'cuantity' => 'required|numeric'
        ]);

        $item->cuantity = $request->cuantity;
        $item->save();
        return redirect('/cart');
    }
    public function buyCart(string $id)
    {
        return $id;
    }
}
