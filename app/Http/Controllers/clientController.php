<?php

namespace App\Http\Controllers;

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
        return view('web.shop');
    }
    public function cart()
    {
        return view('web.cart');
    }
}
