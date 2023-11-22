<?php

namespace App\Http\Controllers;

use App\Models\DepositosPlazo;
use Illuminate\Http\Request;

class DepositosInteresController extends Controller
{
    public function index() {
        $depositosplazo = DepositosPlazo::join('asociados', 'depositos_plazo.id_asociado', '=', 'asociados.id_asociado')
            ->join('clientes', 'clientes.id_cliente', '=', 'asociados.id_cliente')
            ->join('plazos_tasas', 'plazos_tasas.id_tasa', '=', 'depositos_plazo.interes_deposito')
            ->join('plazos', 'plazos.id_plazo', '=', 'depositos_plazo.plazo_deposito')
            ->where('depositos_plazo.estado', 1)
            ->select(
                'clientes.nombre',
                'depositos_plazo.id_deposito_plazo_fijo',
                'depositos_plazo.numero_certificado',
                'depositos_plazo.monto_deposito',
                'depositos_plazo.interes_mensual',
                'depositos_plazo.fecha_deposito',
                'depositos_plazo.fecha_vencimiento',
                'plazos.meses',
                'plazos_tasas.valor'
            )
            ->orderBy('depositos_plazo.numero_certificado', 'desc')
            ->paginate(10);
        
                return view('ruta.vista', compact('depositosplazo'));
    
    }
}
