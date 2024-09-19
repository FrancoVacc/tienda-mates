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

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.categories_create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'categorie' => 'required|unique:categories,categorie|max:255',
            'img' => 'file|image|nullable'
        ]);

        if ($request->hasFile('img')) {
            $file = $request->file('img');
            $filePath = 'img/categories/';
            $fileName = $request->categorie;
            $file->move($filePath, $fileName);
        }
        $categorie = new Categorie();
        $categorie->categorie = $request->categorie;
        $categorie->img = 'img/categories/' . $request->categorie;
        $categorie->save();

        return redirect('categories');
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
        $categorie = Categorie::findOrFail($id);
        return view('dashboard.categories_edit', compact('categorie'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'categorie' => 'required|unique:categories,categorie|max:255',
            'img' => 'file|image|nullable'
        ]);


        if ($request->hasFile('img')) {
            $file = $request->file('img');
            $filePath = 'img/categories/';
            $fileName = $request->categorie;
            if (file_exists($filePath . $fileName)) {
                unlink($filePath . $fileName);
            }
            $file->move($filePath, $fileName);
        }

        $categorie = Categorie::findOrFail($id);
        $categorie->categorie = $request->categorie;
        $categorie->img = 'img/categories/' . $request->categorie;
        $categorie->save();
        return redirect('categories');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $categorie = Categorie::findOrFail($id);
        if (file_exists($categorie->img)) {
            unlink($categorie->img);
        }
        Categorie::destroy($id);
        return redirect('categories');
    }
}
