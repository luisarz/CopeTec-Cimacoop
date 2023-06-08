<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Empleados;
use Session;
use Auth;

class LoginController extends Controller
{
    public function logout()
    {
        Auth::logout();
        Session::flush();
        return redirect("/login");
    }

    public function index()
    {
        return view("welcome");
    }

    public function login(Request $request)
    {
        $username=$request->email;
        $password=$request->password;

        $user=User::where("email",$username)->first();
        $id_empleado_usuario=$user->id_empleado_usuario;
        if(!empty($user->id)){
            if(!Hash::check($password,$user->password)) return Redirect("login");

            $empleados = Empleados::findOrFail($id_empleado_usuario);
            $session = session();
            $session->put('id', $user->id);
            $session->put('email', $user->email);
            $session->put('name', $empleados->nombre_empleado);

            Auth::login($user, true);
            return Redirect("/dashboard");
        }
        return Redirect("login");
    }
}
