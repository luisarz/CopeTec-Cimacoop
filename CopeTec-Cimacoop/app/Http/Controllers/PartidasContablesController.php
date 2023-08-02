<?php

namespace App\Http\Controllers;

use App\Models\Catalogo;
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


        $cuentas = PartidasContablesModel::join('tipos_partidas_contables', 'tipos_partidas_contables.id_tipo_partida', '=', 'partidas_contables.tipo_partida')
            ->when(isset($request->filtro), function ($query) use ($filtro) {
                $query->where('partidas_contables.num_partida', 'LIKE', '%' . $filtro . '%')
                    ->orWhere('partidas_contables.tipo_partida', 'LIKE', '%' . $filtro . '%')
                    ->orWhere('partidas_contables.concepto', 'LIKE', '%' . $filtro . '%');


            })
            // ->select('catalogo_tipo.descripcion as catalogo', 'catalogo.*')
            ->orderBy('partidas_contables.num_partida', 'desc')
            ->paginate(25);
        // dd($cuentas);

        return view('contabilidad.partidas.index', compact('cuentas', 'filtro'));

    }

    public function add()
    {
        Session::put("estadoMenuminimizado", "1");
        $catalogo = Catalogo::where('estado', '=', 1)->get();
        $tipoPartida = TiposPartidasContablesModel::all();
        $idPartida = Str::uuid()->toString();


        return view("contabilidad.partidas.add", compact('catalogo', 'tipoPartida', 'idPartida'));
        
    }

    public function delete(Request $request)
    {
        // $id = $request->id;
        // Catalogo::destroy($id);
        // return redirect("/contabilidad/catalogo");

    }
    public function post(Request $request)
    {
        $cuenta = new PartidasContablesModel();
        $cuenta->numero = $request->numero;
        $cuenta->descripcion = $request->descripcion;
        $cuenta->tipo_catalogo = $request->tipo_catalogo;
        $cuenta->estado = $request->estado;
        $cuenta->movimiento = $request->movimiento;

        $cuenta->saldo = $request->saldo;
        $cuenta->iva = $request->iva;
        $cuenta->save();
        return redirect("/contabilidad/catalogo");
    }
    public function edit($id)
    {
        Session::put("estadoMenuminimizado", "1");

        $catalogo = Catalogo::where('estado', '=', 1)->get();
        $tipoPartida = TiposPartidasContablesModel::all();
        $partida=PartidasContablesModel::find($id);
        return view('contabilidad.partidas.edit', compact('catalogo', 'tipoPartida','partida'));
    }
    public function put(Request $request)
    {
        $cuenta = PartidasContablesModel::find($request->id);
        $cuenta->numero = $request->numero;
        $cuenta->descripcion = $request->descripcion;
        $cuenta->movimiento = $request->movimiento;
        $cuenta->estado = $request->estado;
        $cuenta->saldo = $request->saldo;
        $cuenta->iva = $request->iva;
        $cuenta->save();
        return redirect("/contabilidad/catalogo");
    }


}
