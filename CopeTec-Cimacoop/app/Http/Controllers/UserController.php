<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Empleados;
use App\Models\Roles;

class UserController extends Controller
{
    public function index()
    {
        $users = Empleados::join('users', 'users.id_empleado_usuario', '=', 'empleados.id_empleado')
        ->join('roles','roles.id','users.id_rol')
        ->select('users.*','empleados.nombre_empleado','roles.name')->get();
        return view("user.index", compact("users"));
    }

    public function add()
    {
        $empleados = Empleados::whereDoesntHave('usuario')->get();
        $roles=Roles::All();
        return view("user.add", compact("empleados",'roles'));
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        $empleados = Empleados::All();
        $roles = Roles::All();

        return view("user.edit", compact("user", "empleados",'roles'));
    }


    public function post(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        if ($user && $user->count() > 0) {
            return redirect("/user/add")->withInput()->withErrors(['email' => 'El email ya esta registrado']);
        } else {
            $user = new User();
            $user->id_empleado_usuario = $request->id_empleado_usuario;
            $user->email = $request->email;
            $user->id_rol = $request->id_rol;
            $user->password = Hash::make($request->password);
            $user->save();
            return redirect("/user");
        }

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
        $user->id_rol = $request->id_rol;
        if (!empty($request->password)) {
            $user->password = Hash::make($request->password);
        }
        $user->save();
        return redirect("/user");
    }

}