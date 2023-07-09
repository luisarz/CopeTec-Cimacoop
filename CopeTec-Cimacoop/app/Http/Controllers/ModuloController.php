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
        if($request->is_padre==1){
            $modulo->is_padre = 1;
            $modulo->id_padre = 0;
            $modulo->icono='<span class="menu-icon">
                                <i class="ki-duotone ki-address-book fs-2">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                    <span class="path3"></span>
                                </i>
                            </span>';
        }
        else{
            $modulo->is_padre = 0;
            $modulo->icono='';
            $modulo->id_padre = $request->id_padre;
        }
        $modulo->save();
        return redirect("/modulo");
    } 

    public function post(Request $request)
    {
        //dd($request);
        $modulo = new Modulo();
        $modulo->nombre = $request->modulo;
        $modulo->ruta = $request->ruta;
        $modulo->orden = $request->orden;
        if($request->is_padre==1){
            $modulo->is_padre = 1;
            $modulo->id_padre = 0;
            $modulo->icono='<span class="menu-icon">
                                <i class="ki-duotone ki-address-book fs-2">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                    <span class="path3"></span>
                                </i>
                            </span>';
        }
        else{
            $modulo->is_padre = 0;
            $modulo->icono='';
            $modulo->id_padre = $request->id_padre;
        }
        $modulo->save();
        return redirect("/modulo");
    } 
}
