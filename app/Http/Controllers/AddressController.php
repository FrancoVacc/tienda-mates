<?php

namespace App\Http\Controllers;

use App\Models\Address;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    public function update(Request $request, string $id)
    {

        $request->validate([
            'country' => 'required|string',
            'province' => 'required|string',
            'city' => 'required|string',
            'street' => 'required|string',
            'number' => 'required|string',
            'postcode' => 'required|string',
            'description' => 'required|string',
        ]);

        $address = Address::findOrFail($id);
        $address->country = $request->country;
        $address->province = $request->province;
        $address->city = $request->city;
        $address->street = $request->street;
        $address->number = $request->number;
        $address->postcode = $request->postcode;
        $address->description = $request->description;
        $address->save();

        return redirect('profile');
    }
}
