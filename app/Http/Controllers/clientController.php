<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Message;
use App\Models\Product;
use Illuminate\Http\Request;

class clientController extends Controller
{
    public function index()
    {
        $categories = Categorie::all();
        return view('web.home', compact('categories'));
    }
    public function about()
    {
        return view('web.about');
    }
    public function contact()
    {
        return view('web.contact');
    }
    public function messages(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'lastname' => 'required|max:255',
            'email' => 'required|email',
            'phone' => 'required|max:255',
            'message' => 'required'
        ]);

        $message = new Message();
        $message->name = $request->name;
        $message->lastname = $request->lastname;
        $message->email = $request->email;
        $message->phone = $request->phone;
        $message->message = $request->message;
        $message->readed = false;
        $message->save();

        return redirect('contacto');
    }

    public function message_show()
    {
        $new_messages = Message::all()->where('readed', '=', false);
        $old_messages = Message::all()->where('readed', '=', true);
        return view('dashboard.messages', compact('new_messages', 'old_messages'));
    }

    public function read_message(string $id)
    {
        $message = Message::findOrFail($id);

        if ($message->readed == false) {
            $message->readed = true;
            $message->save();
        }

        return view('dashboard.message', compact('message'));
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
