<?php

namespace App\Http\Controllers;

use App\Models\Catalogo;
use App\Models\PartidasContablesModel;
use App\Models\TiposPartidasContablesModel;
use Illuminate\Http\Request;

class PartidasContablesController extends Controller
{
    public function index(Request $request)
    {

    
        $filtro = $request->input('filtro');
        $cuentas = PartidasContablesModel::join('catalogo','catalogo.id_cuenta','=','partidas_contables.id_partida_contable')
        ->join('catalogo_tipo', 'catalogo_tipo.id_tipo_catalogo', '=', 'catalogo.tipo_catalogo')
            ->when(isset($request->filtro), function ($query) use ($filtro) {
                $query->where('catalogo.descripcion', 'LIKE', '%' . $filtro . '%')
                    ->orWhere('catalogo.numero', 'LIKE', '%' . $filtro . '%');

            })
            ->select('catalogo_tipo.descripcion as catalogo', 'catalogo.*')
            ->orderBy('catalogo.id_cuenta', 'asc')
            ->paginate(10);
        // dd($cuentas);

        return view('contabilidad.partidas.index', compact('cuentas', 'filtro'));

    }

    public function add()
    {
      $catalogo = Catalogo::where('estado', '=', 1)->get();

        return view("contabilidad.partidas.add", compact('catalogo'));
        
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
        // $cuenta = Catalogo::find($id);
        // $tipoCatalogo = TipoCuentaCotableModel::all();

        // return view('contabilidad.catalogo.edit', compact('cuenta', 'tipoCatalogo'));
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
