<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\User;
use App\Models\user_information;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class UserInformationsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::with(['user_information', 'address'])->paginate(10);
        return view('dashboard.customers', compact('users'));
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

        return Redirect::route('profile.edit')->with(['type' => 'success', 'message' => 'Información Actulaizada']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
