<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Cart;
use App\Models\Cart_item;
use App\Models\user_information;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

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

        $items = Cart::where('id_user', $userId)->with('items')->first();
        session(['items' => count($items->items)]);

        return redirect('producto/' . $request->id)->with(['message' => 'El producto fue añadido a tu carrito correctamente', 'type' => 'success']);
    }

    public function cartShow()
    {
        $userId = Auth::id();
        $userInfo = user_information::where('id_user', $userId)->first();
        $userAddress = Address::where('id_user', $userId)->first();

        $cart = Cart::where('id_user', $userId)->with('items')->first();

        if ($cart) {
            $totalPrice = $cart->items->sum(function ($item) {
                return $item->getTotalPrice();
            });

            return view('web.cart', compact('cart', 'totalPrice', 'userInfo', 'userAddress'));
        }

        return view('web.cart');
    }

    public function itemDelete($id)
    {
        Cart_item::destroy($id);
        $userId = Auth::id();
        $items = Cart::where('id_user', $userId)->with('items')->first();
        session(['items' => count($items->items)]);

        return Redirect::route('cart')->with(['message' => 'El producto fué quitado de tu carrito', 'type' => 'success']);
    }
    public function itemUpdate(Request $request, $id)
    {
        $item = Cart_item::findOrFail($id);

        $request->validate([
            'cuantity' => 'required|numeric'
        ]);

        $item->cuantity = $request->cuantity;
        $item->save();
        return Redirect::route('cart')->with(['message' => 'La cantidad fué actualizada correctamente', 'type' => 'success']);
    }
}
