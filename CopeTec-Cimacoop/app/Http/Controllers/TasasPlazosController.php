<?php

namespace App\Http\Controllers;

use App\Models\Plazos;
use App\Models\TasasPlazos;
use Illuminate\Http\Request;

class TasasPlazosController extends Controller
{
    public function index($id)
    {
        $plazo = Plazos::find($id)->select('descripcion','meses')->first();

        $tasasEnPlazo= TasasPlazos::join('plazos','plazos.id_plazo','=','plazos_tasas.id_plazo')
        ->where('plazos_tasas.id_plazo',$id)->paginate(10);
        return view('captaciones.tasas.index', compact('plazo','tasasEnPlazo'));
    }
    public function add()
    {
        return view('captaciones.tasas.add');
    }
    public function edit($id)
    {
        $tasas = TasasPlazos::findOrFail($id);
        return view('captaciones.tasas.edit', compact('tasas'));
    }
    public function put(Request $request)
    {

        $plazo = TasasPlazos::findOrFail($request->id);
        $plazo->descripcion = $request->descripcion;
        $plazo->meses = $request->meses;
        $plazo->save();
        return redirect('/captaciones/tasas');
    }
    public function post(Request $request)
    {

        $plazo = new TasasPlazos();
        $plazo->descripcion = $request->descripcion;
        $plazo->meses = $request->meses;
        $plazo->save();
        return redirect('/captaciones/tasas');
    }
}
