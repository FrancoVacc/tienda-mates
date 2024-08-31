<?php

namespace App\Http\Controllers;

use App\Models\user_information;
use Illuminate\Http\Request;

class UserInformationsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'lastname' => 'required',
            'phone' => 'required',
            'dni' => 'required'
        ]);

        $information = user_information::findOrFail($id);
        $information->lastname = $request->lastname;
        $information->phone = $request->phone;
        $information->dni = $request->dni;
        $information->save();

        return redirect('profile');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
