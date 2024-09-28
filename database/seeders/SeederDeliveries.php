<?php

namespace Database\Seeders;

use App\Models\Delivery;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SeederDeliveries extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $method = ['No Asignado', 'Correo', 'Retiro'];

        foreach ($method as $item) {
            Delivery::create(['name' => $item]);
        }
    }
}
