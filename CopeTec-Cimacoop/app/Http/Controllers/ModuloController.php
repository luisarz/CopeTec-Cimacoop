<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Modulo;

class ModuloController extends Controller
{
    public function index()
    {
        $modulos = Modulo::all();
        return view("modulo.index",compact("modulos"));
    } 

    public function add()
    {
        $modulos = Modulo::Where("is_padre","1")->get();
        return view("modulo.add",compact("modulos"));
    } 

    public function edit($id)
    {
        $modulo = Modulo::Where("id_modulo",$id)->first();
        $modulos = Modulo::Where("is_padre","1")->get();
        return view("modulo.edit",compact("modulo","modulos"));
    } 

    public function delete(Request $request)
    {
        $id = $request->id;
        Modulo::destroy($id);
        return redirect("/modulo");
    }

    public function put(Request $request)
    {
        $modulo = Modulo::Where("id_modulo",$request->id_modulo)->first();
        $modulo->nombre = $request->modulo;
        $modulo->ruta = $request->ruta;
        $modulo->orden = $request->orden;
        $modulo->is_minimazed=$request->is_minimazed;
        $modulo->target = $request->target;

        if($request->is_padre==1){
            $modulo->is_padre = 1;
            $modulo->id_padre = 0;
            $modulo->icono=$request->icono;
        }
        else{
            $modulo->is_padre = 0;
            $modulo->icono=$request->icono;
            $modulo->id_padre = $request->id_padre;
        }
        $modulo->save();
        return redirect("/modulo");
    } 

    public function post(Request $request)
    {
        $modulo = new Modulo();
        $modulo->nombre = $request->modulo;
        $modulo->ruta = $request->ruta;
        $modulo->orden = $request->orden;
        $modulo->is_minimazed=$request->is_minimazed;
        $modulo->target = $request->target;

        if($request->is_padre==1){
            $modulo->is_padre = 1;
            $modulo->id_padre = 0;
            $modulo->icono=$request->icono;
        }
        else{
            $modulo->is_padre = 0;
            $modulo->icono = $request->icono;

            $modulo->id_padre = $request->id_padre;
        }
        $modulo->save();
        return redirect("/modulo");
    } 
}
