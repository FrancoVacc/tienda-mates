<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Message;
use App\Models\Product;
use App\Models\user_information;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

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
        $user = Auth::user();

        if (isset($user)) {
            $user_info = user_information::findOrFail($user->id);

            return view('web.contact', [
                'name' => $user->name,
                'email' => $user->email,
                'lastname' => $user_info->lastname,
                'phone' => $user_info->phone
            ]);
        }
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
        $productos = Product::all();
        return view('web.shop', compact('productos', 'categories'));
    }
    public function category(string $id)
    {
        $categories = Categorie::all();
        $productos = Product::where('id_categorie', '=', $id)->get();
        return view('web.shop_category', compact('productos', 'categories'));
    }
    public function product(string $id)
    {
        $product = Product::FindOrFail($id);
        return view('web.product', compact('product'));
    }
}
