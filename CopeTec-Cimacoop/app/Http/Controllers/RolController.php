<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Roles;

class RolController extends Controller
{
    public function index()
    {
        $roles=Roles::All();
        return view("rol.index",compact("roles"));   
    }

    public function add()
    {
        return view("rol.add");   
    }

    public function edit($id)
    {
        $rol = Roles::findOrFail($id);
        return view("rol.edit",compact("rol"));   
    }


    public function post(Request $request)
    {
        $rol = new Roles();
        $rol->name = $request->name;

        $rol->save();
        return redirect("/rol");
    }

    public function delete(Request $request)
    {
        Roles::destroy($request->id);
        return redirect("/rol");
    }

    public function put(Request $request)
    {
        $rol = Roles::findOrFail($request->id);
        $rol->name = $request->name;
        $rol->save();
        return redirect("/rol");  
    }
}
