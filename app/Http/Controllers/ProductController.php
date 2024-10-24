<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ProductController extends Controller
{

    public function index(Request $request)
    {
        if (!empty($request->query()) && $request->query('categorie') != 0) {

            $categorie = Categorie::findOrFail($request->query('categorie'));
            $products = Product::where('id_categorie', '=', $categorie->id)->paginate(10);
        } else {
            $products = Product::paginate(10);
        }
        $categories = Categorie::all();

        return view('dashboard.products', compact('products', 'categories'));
    }



    public function create()
    {
        $category = Categorie::all();
        return view('dashboard.products_create', compact('category'));
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
            'categorie' => 'required',
            'description' => 'required',
            'img' => 'file|image'
        ]);

        $product = new Product();
        if ($request->hasFile('img')) {
            $file = $request->file('img');
            $cloudinaryImg = $file->storeOnCloudinary('products');
            $publicId = $cloudinaryImg->getPublicId();
        }


        $product->title = $request->title;
        $product->slug = $request->slug;
        $product->price = $request->price;
        if (isset($request->available)) {
            $product->available = true;
        } else {
            $product->available = false;
        }
        $product->id_categorie = $request->categorie;
        $product->description = $request->description;
        $product->img = $request->hasFile('img') ? $publicId : null;
        $product->save();

        return Redirect::route('products.index');
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
        $category = Categorie::all();
        $product = Product::findOrFail($id);
        return view('dashboard.products_edit', compact('product', 'category'));
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
            'categorie' => 'required',
            'description' => 'required',
            'img' => 'file|image'
        ]);

        $product = Product::findOrFail($id);

        if ($request->hasFile('img')) {
            $file = $request->file('img');
            $cloudinaryImg = $file->storeOnCloudinary('products');
            $publicId = $cloudinaryImg->getPublicId();
        }


        $product->title = $request->title;
        $product->slug = $request->slug;
        $product->price = $request->price;
        if (isset($request->available)) {
            $product->available = true;
        } else {
            $product->available = false;
        }
        $product->id_categorie = $request->categorie;
        $product->description = $request->description;
        $product->img = $publicId;
        $product->save();

        return redirect('products');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // $filePath = 'img/products';
        // $product = Product::find($id);
        // $img = $product->slug;
        // $fileName = $filePath . '/' . $img;

        // if (file_exists($fileName)) {
        //     unlink($fileName);
        // }

        Product::destroy($id);
        return redirect('products');
    }
}
