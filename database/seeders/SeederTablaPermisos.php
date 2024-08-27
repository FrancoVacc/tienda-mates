<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

//spatie
use Spatie\Permission\Models\Permission;



class SeederTablaPermisos extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permisos = [
            //productos
            'crear-producto',
            'editar-producto',
            'eliminar-producto',
            'ver-producto',
            //categorias
            'crear-categoria',
            'editar-categoria',
            'eliminar-categoria',
            'ver-categoria',
        ];

        foreach ($permisos as $permiso) {
            Permission::create(['name' => $permiso]);
        }
    }
}
