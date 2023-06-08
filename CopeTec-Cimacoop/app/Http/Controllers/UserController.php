<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Empleados;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = Empleados::join('users', 'users.id_empleado_usuario', '=', 'empleados.id_empleado')->get();
        return view("user.index",compact("users"));   
    }

    public function add()
    {
        $empleados = Empleados::All();
        return view("user.add",compact("empleados"));   
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        $empleados = Empleados::All();
        return view("user.edit",compact("user","empleados"));   
    }


    public function post(Request $request)
    {
        $user = new User();
        $user->id_empleado_usuario = $request->id_empleado_usuario;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);

        $user->save();
        return redirect("/user");
    }

    public function delete(Request $request)
    {
        User::destroy($request->id);
        return redirect("/user");
    }

    public function put(Request $request)
    {
        $user = User::findOrFail($request->id);
        $user->id_empleado_usuario = $request->id_empleado_usuario;
        $user->email = $request->email;
        if(!empty($request->password)){
            $user->password = Hash::make($request->password);
        }
        $user->save();
        return redirect("/user");  
    }

}
