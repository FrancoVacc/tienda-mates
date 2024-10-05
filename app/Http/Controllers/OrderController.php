<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Cart;
use App\Models\Delivery;
use App\Models\Order;
use App\Models\Status;
use App\Models\User;
use App\Models\user_information;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function show()
    {
        $orders = order::with('user', 'statusInfo')->paginate(10);
        return view('dashboard.orders', compact('orders'));
    }
    public function orderShow(string $id)
    {
        $order = Order::with('user')->where('id', '=', $id)->findOrFail($id);
        $user_info = user_information::findOrFail($order->user->id);
        $address = Address::findOrFail($order->user->id);
        $status = Status::all();
        $delivery = Delivery::all();
        return view(
            'dashboard.order',
            compact('order', 'delivery', 'status', 'user_info', 'address')
        );
    }

    public function create()
    {
        $user = Auth::id();
        $userInfo = user_information::where('id_user', $user)->first();
        $userAddress = Address::where('id_user', $user)->first();
        $cart = Cart::where('id_user', $user)->with('items')->first();

        if (!isset($userInfo->lastname) || !isset($userInfo->dni) || !isset($userInfo->phone) || !isset($userAddress->city) || !isset($userAddress->street) || !isset($userAddress->postcode)) {
            return redirect('/profile');
        }

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

        session(['items' => 0]);

        return redirect('/order/my_orders');
    }

    public function update(Request $request, string $id)
    {
        $order = Order::findOrFail($id);
        $order->update([
            'id_status' => $request->status,
            'id_delivery' => $request->delivery,
            'track_link' => $request->track_link
        ]);

        return redirect('/order/' . $id);
    }

    public function myOrders()
    {
        $user = Auth::id();
        $orders = Order::with('statusInfo')->where('id_user', '=', $user)->get();

        return view('dashboard.myorders', compact('orders'));
    }

    public function myOrder(String $id)
    {
        $order = Order::with('deliveryInfo')->findOrFail($id);
        return view('dashboard.myorder', compact('order'));
    }
}
