<?php

namespace Database\Seeders;

use App\Models\PartidaContable;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class PartidaContableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PartidaContable::insert([
            [
                'codigo'=>'1',
                'nombre_cuenta'=>'ACTIVO',
                'tipo_cuenta'=>'ACTIVO',
                'movimiento'=>false,
                'saldo'=>'77593.66',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'codigo'=>'11',
                'nombre_cuenta'=>'ACTIVOS DE INTERMEDIACIÓN',
                'tipo_cuenta'=>'ACTIVO',
                'movimiento'=>false,
                'saldo'=>'54721.93',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],[
                'codigo'=>'1101',
                'nombre_cuenta'=>'EFECTIVO Y EQUIVALENTES DE EFECTIVO',
                'tipo_cuenta'=>'ACTIVO',
                'movimiento'=>false,
                'saldo'=>'54721.93',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],[
                'codigo'=>'110101',
                'nombre_cuenta'=>'EFECTIVO',
                'tipo_cuenta'=>'ACTIVO',
                'movimiento'=>false,
                'saldo'=>'23915.12',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],[
                'codigo'=>'11010101',
                'nombre_cuenta'=>'CAJA GENERAL',
                'tipo_cuenta'=>'ACTIVO',
                'movimiento'=>true,
                'saldo'=>'23885.00',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],[
                'codigo'=>'11010102',
                'nombre_cuenta'=>'CAJA CHICA',
                'tipo_cuenta'=>'ACTIVO',
                'movimiento'=>true,
                'saldo'=>'30.12',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],[
                'codigo'=>'11010103',
                'nombre_cuenta'=>'NUMERARIO EN RESERVA',
                'tipo_cuenta'=>'ACTIVO',
                'movimiento'=>true,
                'saldo'=>'0',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],[
                'codigo'=>'1',
                'nombre_cuenta'=>'ACTIVO',
                'tipo_cuenta'=>'ACTIVO',
                'movimiento'=>false,
                'saldo'=>'77593.66',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],[
                'codigo'=>'1',
                'nombre_cuenta'=>'ACTIVO',
                'tipo_cuenta'=>'ACTIVO',
                'movimiento'=>false,
                'saldo'=>'77593.66',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],[
                'codigo'=>'1',
                'nombre_cuenta'=>'ACTIVO',
                'tipo_cuenta'=>'ACTIVO',
                'movimiento'=>false,
                'saldo'=>'77593.66',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],[
                'codigo'=>'1',
                'nombre_cuenta'=>'ACTIVO',
                'tipo_cuenta'=>'ACTIVO',
                'movimiento'=>false,
                'saldo'=>'77593.66',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],[
                'codigo'=>'1',
                'nombre_cuenta'=>'ACTIVO',
                'tipo_cuenta'=>'ACTIVO',
                'movimiento'=>false,
                'saldo'=>'77593.66',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],[
                'codigo'=>'1',
                'nombre_cuenta'=>'ACTIVO',
                'tipo_cuenta'=>'ACTIVO',
                'movimiento'=>false,
                'saldo'=>'77593.66',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],[
                'codigo'=>'1',
                'nombre_cuenta'=>'ACTIVO',
                'tipo_cuenta'=>'ACTIVO',
                'movimiento'=>false,
                'saldo'=>'77593.66',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],[
                'codigo'=>'1',
                'nombre_cuenta'=>'ACTIVO',
                'tipo_cuenta'=>'ACTIVO',
                'movimiento'=>false,
                'saldo'=>'77593.66',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],[
                'codigo'=>'1',
                'nombre_cuenta'=>'ACTIVO',
                'tipo_cuenta'=>'ACTIVO',
                'movimiento'=>false,
                'saldo'=>'77593.66',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],[
                'codigo'=>'1',
                'nombre_cuenta'=>'ACTIVO',
                'tipo_cuenta'=>'ACTIVO',
                'movimiento'=>false,
                'saldo'=>'77593.66',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],[
                'codigo'=>'1',
                'nombre_cuenta'=>'ACTIVO',
                'tipo_cuenta'=>'ACTIVO',
                'movimiento'=>false,
                'saldo'=>'77593.66',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],[
                'codigo'=>'1',
                'nombre_cuenta'=>'ACTIVO',
                'tipo_cuenta'=>'ACTIVO',
                'movimiento'=>false,
                'saldo'=>'77593.66',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],[
                'codigo'=>'1',
                'nombre_cuenta'=>'ACTIVO',
                'tipo_cuenta'=>'ACTIVO',
                'movimiento'=>false,
                'saldo'=>'77593.66',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],[
                'codigo'=>'1',
                'nombre_cuenta'=>'ACTIVO',
                'tipo_cuenta'=>'ACTIVO',
                'movimiento'=>false,
                'saldo'=>'77593.66',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],[
                'codigo'=>'1',
                'nombre_cuenta'=>'ACTIVO',
                'tipo_cuenta'=>'ACTIVO',
                'movimiento'=>false,
                'saldo'=>'77593.66',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],[
                'codigo'=>'1',
                'nombre_cuenta'=>'ACTIVO',
                'tipo_cuenta'=>'ACTIVO',
                'movimiento'=>false,
                'saldo'=>'77593.66',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],[
                'codigo'=>'1',
                'nombre_cuenta'=>'ACTIVO',
                'tipo_cuenta'=>'ACTIVO',
                'movimiento'=>false,
                'saldo'=>'77593.66',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],[
                'codigo'=>'1',
                'nombre_cuenta'=>'ACTIVO',
                'tipo_cuenta'=>'ACTIVO',
                'movimiento'=>false,
                'saldo'=>'77593.66',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],[
                'codigo'=>'1',
                'nombre_cuenta'=>'ACTIVO',
                'tipo_cuenta'=>'ACTIVO',
                'movimiento'=>false,
                'saldo'=>'77593.66',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],[
                'codigo'=>'1',
                'nombre_cuenta'=>'ACTIVO',
                'tipo_cuenta'=>'ACTIVO',
                'movimiento'=>false,
                'saldo'=>'77593.66',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],[
                'codigo'=>'1',
                'nombre_cuenta'=>'ACTIVO',
                'tipo_cuenta'=>'ACTIVO',
                'movimiento'=>false,
                'saldo'=>'77593.66',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],[
                'codigo'=>'1',
                'nombre_cuenta'=>'ACTIVO',
                'tipo_cuenta'=>'ACTIVO',
                'movimiento'=>false,
                'saldo'=>'77593.66',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],[
                'codigo'=>'1',
                'nombre_cuenta'=>'ACTIVO',
                'tipo_cuenta'=>'ACTIVO',
                'movimiento'=>false,
                'saldo'=>'77593.66',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],[
                'codigo'=>'1',
                'nombre_cuenta'=>'ACTIVO',
                'tipo_cuenta'=>'ACTIVO',
                'movimiento'=>false,
                'saldo'=>'77593.66',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],[
                'codigo'=>'1',
                'nombre_cuenta'=>'ACTIVO',
                'tipo_cuenta'=>'ACTIVO',
                'movimiento'=>false,
                'saldo'=>'77593.66',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],[
                'codigo'=>'1',
                'nombre_cuenta'=>'ACTIVO',
                'tipo_cuenta'=>'ACTIVO',
                'movimiento'=>false,
                'saldo'=>'77593.66',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],[
                'codigo'=>'1',
                'nombre_cuenta'=>'ACTIVO',
                'tipo_cuenta'=>'ACTIVO',
                'movimiento'=>false,
                'saldo'=>'77593.66',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],[
                'codigo'=>'1',
                'nombre_cuenta'=>'ACTIVO',
                'tipo_cuenta'=>'ACTIVO',
                'movimiento'=>false,
                'saldo'=>'77593.66',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],[
                'codigo'=>'1',
                'nombre_cuenta'=>'ACTIVO',
                'tipo_cuenta'=>'ACTIVO',
                'movimiento'=>false,
                'saldo'=>'77593.66',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],[
                'codigo'=>'1',
                'nombre_cuenta'=>'ACTIVO',
                'tipo_cuenta'=>'ACTIVO',
                'movimiento'=>false,
                'saldo'=>'77593.66',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],[
                'codigo'=>'1',
                'nombre_cuenta'=>'ACTIVO',
                'tipo_cuenta'=>'ACTIVO',
                'movimiento'=>false,
                'saldo'=>'77593.66',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],[
                'codigo'=>'1',
                'nombre_cuenta'=>'ACTIVO',
                'tipo_cuenta'=>'ACTIVO',
                'movimiento'=>false,
                'saldo'=>'77593.66',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],[
                'codigo'=>'1',
                'nombre_cuenta'=>'ACTIVO',
                'tipo_cuenta'=>'ACTIVO',
                'movimiento'=>false,
                'saldo'=>'77593.66',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],[
                'codigo'=>'1',
                'nombre_cuenta'=>'ACTIVO',
                'tipo_cuenta'=>'ACTIVO',
                'movimiento'=>false,
                'saldo'=>'77593.66',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],[
                'codigo'=>'1',
                'nombre_cuenta'=>'ACTIVO',
                'tipo_cuenta'=>'ACTIVO',
                'movimiento'=>false,
                'saldo'=>'77593.66',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],[
                'codigo'=>'1',
                'nombre_cuenta'=>'ACTIVO',
                'tipo_cuenta'=>'ACTIVO',
                'movimiento'=>false,
                'saldo'=>'77593.66',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],[
                'codigo'=>'1',
                'nombre_cuenta'=>'ACTIVO',
                'tipo_cuenta'=>'ACTIVO',
                'movimiento'=>false,
                'saldo'=>'77593.66',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],[
                'codigo'=>'1',
                'nombre_cuenta'=>'ACTIVO',
                'tipo_cuenta'=>'ACTIVO',
                'movimiento'=>false,
                'saldo'=>'77593.66',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],[
                'codigo'=>'1',
                'nombre_cuenta'=>'ACTIVO',
                'tipo_cuenta'=>'ACTIVO',
                'movimiento'=>false,
                'saldo'=>'77593.66',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],[
                'codigo'=>'1',
                'nombre_cuenta'=>'ACTIVO',
                'tipo_cuenta'=>'ACTIVO',
                'movimiento'=>false,
                'saldo'=>'77593.66',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],[
                'codigo'=>'1',
                'nombre_cuenta'=>'ACTIVO',
                'tipo_cuenta'=>'ACTIVO',
                'movimiento'=>false,
                'saldo'=>'77593.66',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],[
                'codigo'=>'1',
                'nombre_cuenta'=>'ACTIVO',
                'tipo_cuenta'=>'ACTIVO',
                'movimiento'=>false,
                'saldo'=>'77593.66',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],[
                'codigo'=>'1',
                'nombre_cuenta'=>'ACTIVO',
                'tipo_cuenta'=>'ACTIVO',
                'movimiento'=>false,
                'saldo'=>'77593.66',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],[
                'codigo'=>'1',
                'nombre_cuenta'=>'ACTIVO',
                'tipo_cuenta'=>'ACTIVO',
                'movimiento'=>false,
                'saldo'=>'77593.66',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],[
                'codigo'=>'1',
                'nombre_cuenta'=>'ACTIVO',
                'tipo_cuenta'=>'ACTIVO',
                'movimiento'=>false,
                'saldo'=>'77593.66',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],[
                'codigo'=>'1',
                'nombre_cuenta'=>'ACTIVO',
                'tipo_cuenta'=>'ACTIVO',
                'movimiento'=>false,
                'saldo'=>'77593.66',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],[
                'codigo'=>'1',
                'nombre_cuenta'=>'ACTIVO',
                'tipo_cuenta'=>'ACTIVO',
                'movimiento'=>false,
                'saldo'=>'77593.66',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],[
                'codigo'=>'1',
                'nombre_cuenta'=>'ACTIVO',
                'tipo_cuenta'=>'ACTIVO',
                'movimiento'=>false,
                'saldo'=>'77593.66',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],[
                'codigo'=>'1',
                'nombre_cuenta'=>'ACTIVO',
                'tipo_cuenta'=>'ACTIVO',
                'movimiento'=>false,
                'saldo'=>'77593.66',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],[
                'codigo'=>'1',
                'nombre_cuenta'=>'ACTIVO',
                'tipo_cuenta'=>'ACTIVO',
                'movimiento'=>false,
                'saldo'=>'77593.66',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],[
                'codigo'=>'1',
                'nombre_cuenta'=>'ACTIVO',
                'tipo_cuenta'=>'ACTIVO',
                'movimiento'=>false,
                'saldo'=>'77593.66',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],[
                'codigo'=>'1',
                'nombre_cuenta'=>'ACTIVO',
                'tipo_cuenta'=>'ACTIVO',
                'movimiento'=>false,
                'saldo'=>'77593.66',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],[
                'codigo'=>'1',
                'nombre_cuenta'=>'ACTIVO',
                'tipo_cuenta'=>'ACTIVO',
                'movimiento'=>false,
                'saldo'=>'77593.66',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],[
                'codigo'=>'1',
                'nombre_cuenta'=>'ACTIVO',
                'tipo_cuenta'=>'ACTIVO',
                'movimiento'=>false,
                'saldo'=>'77593.66',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],[
                'codigo'=>'1',
                'nombre_cuenta'=>'ACTIVO',
                'tipo_cuenta'=>'ACTIVO',
                'movimiento'=>false,
                'saldo'=>'77593.66',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],[
                'codigo'=>'1',
                'nombre_cuenta'=>'ACTIVO',
                'tipo_cuenta'=>'ACTIVO',
                'movimiento'=>false,
                'saldo'=>'77593.66',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],[
                'codigo'=>'1',
                'nombre_cuenta'=>'ACTIVO',
                'tipo_cuenta'=>'ACTIVO',
                'movimiento'=>false,
                'saldo'=>'77593.66',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],[
                'codigo'=>'1',
                'nombre_cuenta'=>'ACTIVO',
                'tipo_cuenta'=>'ACTIVO',
                'movimiento'=>false,
                'saldo'=>'77593.66',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],[
                'codigo'=>'1',
                'nombre_cuenta'=>'ACTIVO',
                'tipo_cuenta'=>'ACTIVO',
                'movimiento'=>false,
                'saldo'=>'77593.66',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],[
                'codigo'=>'1',
                'nombre_cuenta'=>'ACTIVO',
                'tipo_cuenta'=>'ACTIVO',
                'movimiento'=>false,
                'saldo'=>'77593.66',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],[
                'codigo'=>'1',
                'nombre_cuenta'=>'ACTIVO',
                'tipo_cuenta'=>'ACTIVO',
                'movimiento'=>false,
                'saldo'=>'77593.66',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],[
                'codigo'=>'1',
                'nombre_cuenta'=>'ACTIVO',
                'tipo_cuenta'=>'ACTIVO',
                'movimiento'=>false,
                'saldo'=>'77593.66',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],[
                'codigo'=>'1',
                'nombre_cuenta'=>'ACTIVO',
                'tipo_cuenta'=>'ACTIVO',
                'movimiento'=>false,
                'saldo'=>'77593.66',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],[
                'codigo'=>'1',
                'nombre_cuenta'=>'ACTIVO',
                'tipo_cuenta'=>'ACTIVO',
                'movimiento'=>false,
                'saldo'=>'77593.66',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],[
                'codigo'=>'1',
                'nombre_cuenta'=>'ACTIVO',
                'tipo_cuenta'=>'ACTIVO',
                'movimiento'=>false,
                'saldo'=>'77593.66',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],[
                'codigo'=>'1',
                'nombre_cuenta'=>'ACTIVO',
                'tipo_cuenta'=>'ACTIVO',
                'movimiento'=>false,
                'saldo'=>'77593.66',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],[
                'codigo'=>'1',
                'nombre_cuenta'=>'ACTIVO',
                'tipo_cuenta'=>'ACTIVO',
                'movimiento'=>false,
                'saldo'=>'77593.66',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],[
                'codigo'=>'1',
                'nombre_cuenta'=>'ACTIVO',
                'tipo_cuenta'=>'ACTIVO',
                'movimiento'=>false,
                'saldo'=>'77593.66',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],[
                'codigo'=>'1',
                'nombre_cuenta'=>'ACTIVO',
                'tipo_cuenta'=>'ACTIVO',
                'movimiento'=>false,
                'saldo'=>'77593.66',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],[
                'codigo'=>'1',
                'nombre_cuenta'=>'ACTIVO',
                'tipo_cuenta'=>'ACTIVO',
                'movimiento'=>false,
                'saldo'=>'77593.66',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],[
                'codigo'=>'1',
                'nombre_cuenta'=>'ACTIVO',
                'tipo_cuenta'=>'ACTIVO',
                'movimiento'=>false,
                'saldo'=>'77593.66',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],[
                'codigo'=>'1',
                'nombre_cuenta'=>'ACTIVO',
                'tipo_cuenta'=>'ACTIVO',
                'movimiento'=>false,
                'saldo'=>'77593.66',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],[
                'codigo'=>'1',
                'nombre_cuenta'=>'ACTIVO',
                'tipo_cuenta'=>'ACTIVO',
                'movimiento'=>false,
                'saldo'=>'77593.66',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],[
                'codigo'=>'1',
                'nombre_cuenta'=>'ACTIVO',
                'tipo_cuenta'=>'ACTIVO',
                'movimiento'=>false,
                'saldo'=>'77593.66',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],[
                'codigo'=>'1',
                'nombre_cuenta'=>'ACTIVO',
                'tipo_cuenta'=>'ACTIVO',
                'movimiento'=>false,
                'saldo'=>'77593.66',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],[
                'codigo'=>'1',
                'nombre_cuenta'=>'ACTIVO',
                'tipo_cuenta'=>'ACTIVO',
                'movimiento'=>false,
                'saldo'=>'77593.66',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],[
                'codigo'=>'1',
                'nombre_cuenta'=>'ACTIVO',
                'tipo_cuenta'=>'ACTIVO',
                'movimiento'=>false,
                'saldo'=>'77593.66',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],[
                'codigo'=>'1',
                'nombre_cuenta'=>'ACTIVO',
                'tipo_cuenta'=>'ACTIVO',
                'movimiento'=>false,
                'saldo'=>'77593.66',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],[
                'codigo'=>'1',
                'nombre_cuenta'=>'ACTIVO',
                'tipo_cuenta'=>'ACTIVO',
                'movimiento'=>false,
                'saldo'=>'77593.66',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],[
                'codigo'=>'1',
                'nombre_cuenta'=>'ACTIVO',
                'tipo_cuenta'=>'ACTIVO',
                'movimiento'=>false,
                'saldo'=>'77593.66',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],[
                'codigo'=>'1',
                'nombre_cuenta'=>'ACTIVO',
                'tipo_cuenta'=>'ACTIVO',
                'movimiento'=>false,
                'saldo'=>'77593.66',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],[
                'codigo'=>'1',
                'nombre_cuenta'=>'ACTIVO',
                'tipo_cuenta'=>'ACTIVO',
                'movimiento'=>false,
                'saldo'=>'77593.66',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],[
                'codigo'=>'1',
                'nombre_cuenta'=>'ACTIVO',
                'tipo_cuenta'=>'ACTIVO',
                'movimiento'=>false,
                'saldo'=>'77593.66',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],[
                'codigo'=>'1',
                'nombre_cuenta'=>'ACTIVO',
                'tipo_cuenta'=>'ACTIVO',
                'movimiento'=>false,
                'saldo'=>'77593.66',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],[
                'codigo'=>'1',
                'nombre_cuenta'=>'ACTIVO',
                'tipo_cuenta'=>'ACTIVO',
                'movimiento'=>false,
                'saldo'=>'77593.66',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],[
                'codigo'=>'1',
                'nombre_cuenta'=>'ACTIVO',
                'tipo_cuenta'=>'ACTIVO',
                'movimiento'=>false,
                'saldo'=>'77593.66',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],[
                'codigo'=>'1',
                'nombre_cuenta'=>'ACTIVO',
                'tipo_cuenta'=>'ACTIVO',
                'movimiento'=>false,
                'saldo'=>'77593.66',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],[
                'codigo'=>'1',
                'nombre_cuenta'=>'ACTIVO',
                'tipo_cuenta'=>'ACTIVO',
                'movimiento'=>false,
                'saldo'=>'77593.66',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],[
                'codigo'=>'1',
                'nombre_cuenta'=>'ACTIVO',
                'tipo_cuenta'=>'ACTIVO',
                'movimiento'=>false,
                'saldo'=>'77593.66',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],[
                'codigo'=>'1',
                'nombre_cuenta'=>'ACTIVO',
                'tipo_cuenta'=>'ACTIVO',
                'movimiento'=>false,
                'saldo'=>'77593.66',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],[
                'codigo'=>'1',
                'nombre_cuenta'=>'ACTIVO',
                'tipo_cuenta'=>'ACTIVO',
                'movimiento'=>false,
                'saldo'=>'77593.66',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],[
                'codigo'=>'1',
                'nombre_cuenta'=>'ACTIVO',
                'tipo_cuenta'=>'ACTIVO',
                'movimiento'=>false,
                'saldo'=>'77593.66',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
        ]);
    }
}
