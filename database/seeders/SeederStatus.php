<?php

namespace Database\Seeders;

use App\Models\Status;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SeederStatus extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $status = ['Pendiente', 'Pago Recibido', 'Despachado', 'Entregado', 'Cancelado', 'Devuelto'];

        foreach ($status as $item) {
            Status::create(['name' => $item]);
        }
    }
}
