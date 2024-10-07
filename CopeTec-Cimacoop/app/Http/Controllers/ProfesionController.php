<?php

namespace App\Http\Controllers;
use App\Models\Profesion;
use Illuminate\Http\Request;

class ProfesionController extends Controller
{
    public function index()
    {
        $profesiones=Profesion::paginate(10);
        return view("profesion.index",compact("profesiones"));
    }

    public function add()
    {
        return view("profesion.add");
    }

    public function edit($id)
    {
        $profesion = Profesion::findOrFail($id);
        return view("profesion.edit",compact("profesion"));
    }


    public function post(Request $request)
    {
        $rol = new Profesion();
        $rol->name = $request->name;

        $rol->save();
        return redirect("/profesiones");
    }

    public function delete(Request $request)
    {
        Profesion::destroy($request->id);
        return redirect("/profesiones");
    }

    public function put(Request $request)
    {
        $rol = Profesion::findOrFail($request->id);
        $rol->name = $request->name;
        $rol->save();
        return redirect("/profesiones");
    }
}
