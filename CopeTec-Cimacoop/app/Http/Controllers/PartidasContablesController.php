<?php

namespace App\Http\Controllers;

use App\Models\Catalogo;
use App\Models\PartidaContableDetalleModel;
use App\Models\PartidasContablesModel;
use App\Models\TiposPartidasContablesModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class PartidasContablesController extends Controller
{
    public function index(Request $request)
    {
       

        $filtro = $request->input('filtro');
        $fecha_partida = $request->input('fecha_partida');
        $cuentas = PartidasContablesModel::join('tipos_partidas_contables', 'tipos_partidas_contables.id_tipo_partida', '=', 'partidas_contables.tipo_partida')
            ->when(isset($filtro), function ($query) use ($filtro) {
                $query->where(function ($subquery) use ($filtro) {
                    $subquery->where('partidas_contables.num_partida', 'LIKE', '%' . $filtro . '%')
                        ->orWhere('partidas_contables.tipo_partida', 'LIKE', '%' . $filtro . '%')
                        ->orWhere('partidas_contables.concepto', 'LIKE', '%' . $filtro . '%');
                });
            })
            ->when(isset($fecha_partida), function ($query) use ($fecha_partida) {
                $query->where('partidas_contables.fecha_partida', '=', $fecha_partida);
            })
            ->select('partidas_contables.*', 'tipos_partidas_contables.descripcion')
            ->orderBy('partidas_contables.num_partida', 'desc')
            ->paginate(10);

        return view('contabilidad.partidas.index', compact('cuentas', 'filtro','fecha_partida'));

    }

    public function add()
    {
        Session::put("estadoMenuminimizado", "1");
        $catalogo = Catalogo::where('estado', '=', 1)->get();
        $tipoPartida = TiposPartidasContablesModel::all();
        $idPartida = Str::uuid()->toString();
        return view("contabilidad.partidas.add", compact('catalogo', 'tipoPartida', 'idPartida'));

    }


   
    public function edit($id)
    {
        Session::put("estadoMenuminimizado", "1");

        $catalogo = Catalogo::where('estado', '=', 1)->get();
        $tipoPartida = TiposPartidasContablesModel::all();
        $partida = PartidasContablesModel::find($id);
        return view('contabilidad.partidas.edit', compact('catalogo', 'tipoPartida', 'partida'));
    }
    public function put(Request $request)
    {
        $partidaContable = PartidasContablesModel::find($request->id_partida);
        $partidaContable->num_partida = $request->num_partida;
        // $partidaContable->year_contable = $request->yearContable;
        $partidaContable->tipo_partida = $request->tipo_partida;
        $partidaContable->fecha_partida = $request->fecha_partida;
        $partidaContable->concepto = $request->concepto;
        $partidaContable->estado = 2;
        $partidaContable->delete_allowed = 1;
        $partidaContable->save();

        // $detallesPartida=PartidaContableDetalleModel::where('id_partida','=',$request->id_partida)->get();
        // $detallesPartida->each->update(['fecha_procesamiento'=> $request->fecha_partida]);

        return response()->json([
            'estado' => "success",
            'message' => 'Partida guardada correctamente'
        ], 200);
    }


}