<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function show()
    {
        //mostrar una tabla con todos los pedidos, nombres de los clientes, etc.
        //mostrar acciones
        // cuando haga click mostrar todo el pedido del cliente usando el numero de orden.
    }

    public function create()
    {
        $user = Auth::id();
        $cart = Cart::where('id_user', $user)->with('items')->first();

        $items = [];
        foreach ($cart->items as $item) {
            array_push($items, [
                'id_product' => $item->id_product,
                'product_title' => $item->product_title,
                'cuantity' => $item->cuantity,
                'price' => $item->price,
                'img' => $item->img
            ]);
        }

        $totalPrice = $cart->items->sum(function ($item) {
            return $item->getTotalPrice();
        });

        $order_number = 'u' . $user . 'd' . date('U');

        Order::create([
            'order_number' => $order_number,
            'id_user' => $user,
            'items' => json_encode($items),
            'delivery_date' => date("Y-m-d", strtotime(date('Y-m-d') . "+ 1 week")),
            'price' => $totalPrice,
        ]);

        Cart::destroy($cart->id);
    }

    public function myOrders()
    {
        $user = Auth::id();
        $orders = Order::all()->where('id_user', '=', $user);

        return view('dashboard.orders', compact('orders'));
    }

    public function order(String $id)
    {
        $order = Order::findOrFail($id);

        $order_number = $order->order_number;
        $items = json_decode($order->items);
        $delivery = $order->delivery;
        $delivery_date = $order->delivery_date;
        $track_link = $order->track_link;
        $price = $order->price;
        $status = $order->status;

        return view('dashboard.order', [
            'order_number' => $order_number,
            'items' => $items,
            'delivery' => $delivery,
            'delivery_date' => $delivery_date,
            'track_link' => $track_link,
            'status' => $status,
            'price' => $price
        ]);
    }
}
