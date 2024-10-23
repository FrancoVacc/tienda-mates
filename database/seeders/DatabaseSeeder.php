<?php

namespace Database\Seeders;

use App\Models\Address;
use App\Models\User;
use App\Models\user_information;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Creating Admin user

        $user = User::create([
            'name' => 'Admin',
            'email' => 'Admin@mate.com',
            'password' => '12345678'
        ]);

        // assign Admin Rol
        $user->assignRole('admin');

        // new profile information
        $user_information = user_information::create([
            'id_user' => $user->id,
            'lastname' => null,
            'dni' => null,
            'phone' => null
        ]);

        $address = Address::create([
            'id_user' => $user->id,
            'country' => null,
            'province' => null,
            'city' => null,
            'street' => null,
            'number' => null,
            'postcode' => null,
            'description' => null
        ]);
    }
}
