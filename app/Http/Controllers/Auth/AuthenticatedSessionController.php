<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\Cart;
use App\Models\Message;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Spatie\Permission\Middleware\RoleMiddleware;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        $userId = Auth::id();
        $items = Cart::where('id_user', $userId)->with('items')->first();
        if (isset($items)) {
            session(['items' => count($items->items)]);
        } else {
            session(['items' => 0]);
        }

        if (Auth::id() == 1) {
            //recuperar el numero de mensajes nuevos
            $message = Message::all()->where('readed', '=', 0);
            //recuperar el numero de pedidos pendientes
            $orders = Order::all()->where('id_status', '=', 1);
            session(['newMessages' => count($message), 'newOrders' => count($orders)]);
        }

        return redirect()->intended(route('home', absolute: false));
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
