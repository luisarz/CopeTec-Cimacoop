<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Modulo;
use App\Models\Roles;
use App\Models\ModuloRol;

class PermisosController extends Controller
{
    public function index()
    {
        $modulos = Modulo::all();
        $roles = Roles::all();
        return view("permisos.index",compact("modulos","roles"));
    }

    public function getAccess(Request $request)
    {
        $moduloRolQuery = ModuloRol::Where("id_rol",$request->id_rol)->get();
        return response()->json($moduloRolQuery, 200);
    }
    
    public function allowAccess(Request $request)
    {
        $moduloRolQuery = ModuloRol::Where("id_modulo",$request->id_modulo)
        ->where("id_rol",$request->id_rol)->first();
        if($request->isActive == "true" && $moduloRolQuery==null){
            $moduloRol = new ModuloRol();
            $moduloRol->id_modulo=$request->id_modulo;
            $moduloRol->id_rol=$request->id_rol;
            $moduloRol->save();
        }
        else if($request->isActive == "false")
        {
            if($moduloRolQuery!=null){
                ModuloRol::destroy($moduloRolQuery->id);
            }
        }
    }

}
