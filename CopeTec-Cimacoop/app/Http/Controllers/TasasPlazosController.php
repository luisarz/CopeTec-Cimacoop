<?php

namespace App\Http\Controllers;

use App\Models\Plazos;
use App\Models\TasasPlazos;
use Illuminate\Http\Request;

class TasasPlazosController extends Controller
{
    public function index($id)
    {
        $plazo = Plazos::find($id)->select('descripcion', 'meses', 'id_plazo')->first();
        $tasasEnPlazo = TasasPlazos::join('plazos', 'plazos.id_plazo', '=', 'plazos_tasas.id_plazo')
            ->where('plazos_tasas.id_plazo', $id)
            ->select('plazos.*', 'plazos_tasas.id_tasa', 'plazos_tasas.valor')->paginate(10);
        return view('captaciones.tasas.index', compact('plazo', 'tasasEnPlazo', 'id'));
    }
    public function add($id)
    {
        return view('captaciones.tasas.add', compact('id'));
    }
    public function edit($id)
    {
        $tasa = TasasPlazos::findOrFail($id);
        return view('captaciones.tasas.edit', compact('tasa'));
    }
    public function put(Request $request)
    {

        $plazo = TasasPlazos::findOrFail($request->id);
        $plazo->valor = $request->valor;
        $plazo->save();
        return redirect('/captaciones/tasas/' . $request->id_plazo);
    }
    public function post(Request $request)
    {

        $plazo = new TasasPlazos();
        $plazo->id_plazo = $request->id_plazo;
        $plazo->valor = $request->valor;
        $plazo->save();
        return redirect('/captaciones/tasas/' . $request->id_plazo);
    }
    public function getTasasByPlazoid($id)
    {
        $plazo = Plazos::where('id_plazo', '=', $id)->select('descripcion', 'meses', 'id_plazo')->first();
        $tasasEnPlazo = TasasPlazos::join('plazos', 'plazos.id_plazo', '=', 'plazos_tasas.id_plazo')
            ->where('plazos_tasas.id_plazo', '=', $id)
            ->select('plazos_tasas.id_tasa', 'plazos_tasas.valor', 'plazos.descripcion')->get();
        $diasDeposito = 0;
        if ($plazo) {
            $diasDeposito = $plazo->meses*30;
        }

        return response()->json([
            "tasasInteres" => $tasasEnPlazo,
            "diasDeposito" => $diasDeposito
        ]);


    }
}