<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    public function index()
    {
        $categories = Categorie::paginate(10);
        return view('dashboard.categories', compact('categories'));
    }


    public function create()
    {
        return view('dashboard.categories_create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'categorie' => 'required|unique:categories,categorie|max:255',
            'img' => 'required|file|image'
        ]);

        if ($request->hasFile('img')) {
            $file = $request->file('img');
            $cloudinaryImg = $file->storeOnCloudinary('categories');
            $publicId = $cloudinaryImg->getPublicId();
        }
        $categorie = new Categorie();
        $categorie->categorie = $request->categorie;
        $categorie->img = $request->hasFile('img') ? $publicId : null;
        $categorie->save();

        return redirect('categories');
    }


    public function show(string $id)
    {
        //
    }


    public function edit(string $id)
    {
        $categorie = Categorie::findOrFail($id);
        return view('dashboard.categories_edit', compact('categorie'));
    }


    public function update(Request $request, string $id)
    {
        $request->validate([
            'categorie' => 'required|unique:categories,categorie|max:255',
            'img' => 'file|image|nullable'
        ]);


        if ($request->hasFile('img')) {
            $file = $request->file('img');
            $cloudinaryImg = $file->storeOnCloudinary('categories');
            $publicId = $cloudinaryImg->getPublicId();
        }

        $categorie = Categorie::findOrFail($id);
        $categorie->categorie = $request->categorie;
        $categorie->img = $request->hasFile('img') ? $publicId : null;
        $categorie->save();
        return redirect('categories');
    }

    public function destroy(string $id)
    {
        Categorie::destroy($id);
        return redirect('categories');
    }
}
