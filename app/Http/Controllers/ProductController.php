<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return view('dashboard.products', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.products_create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'slug' => 'required|max:255|string',
            'price' => 'required|numeric',
            'description' => 'required',
            'img' => 'file|image'
        ]);

        $product = new Product();
        if ($request->hasFile('img')) {
            $file = $request->file('img');
            $filePath = 'img/products/';
            $fileName = $request->slug;
            $file->move($filePath, $fileName);
        }

        $product->title = $request->title;
        $product->slug = $request->slug;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->img = $request->hasFile('img') ? $request->slug : null;
        $product->save();

        return redirect('products');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::findOrFail($id);
        return view('dashboard.products_edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required|max:255',
            'slug' => 'required|max:255|string',
            'price' => 'required|numeric',
            'description' => 'required',
            'img' => 'file|image'
        ]);

        if ($request->hasFile('img')) {
            $file = $request->file('img');
            $filePath = 'img/products/';
            $fileName = $request->slug;
            if (file_exists($filePath . '/' . $fileName)) {
                unlink($filePath . '/' . $fileName);
            }
            $file->move($filePath, $fileName);
        }

        $product = Product::findOrFail($id);

        $product->title = $request->title;
        $product->slug = $request->slug;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->img = $request->hasFile('img') ? $request->slug : null;
        $product->save();

        return redirect('products');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $filePath = 'img/products';
        $product = Product::find($id);
        $img = $product->slug;
        $fileName = $filePath . '/' . $img;

        if (file_exists($fileName)) {
            unlink($fileName);
        }

        Product::destroy($id);
        return redirect('products');
    }
}
