<?php

namespace App\Http\Controllers;

use App\Models\Plazos;
use Illuminate\Http\Request;

class PlazosController extends Controller
{
    public function index()
    {
        $plazos=Plazos::paginate(10);

        return view('captaciones.plazos.index',compact('plazos'));
    }
    public function add()
    {
        return view('captaciones.plazos.add');
    }
    public function edit($id)
    {
        $plazo=Plazos::findOrFail($id);
        return view('captaciones.plazos.edit',compact('plazo'));
    }
    public function put(Request $request)
    {

        $plazo=Plazos::findOrFail($request->id);
        $plazo->descripcion=$request->descripcion;
        $plazo->meses=$request->meses;
        $plazo->save();
        return redirect('/captaciones/plazos');
    }
    public function post(Request $request)
    {

        $plazo = new Plazos();
        $plazo->descripcion = $request->descripcion;
        $plazo->meses = $request->meses;
        $plazo->save();
        return redirect('/captaciones/plazos');
    }

    

}
