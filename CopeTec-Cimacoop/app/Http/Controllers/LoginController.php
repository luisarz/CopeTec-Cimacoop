<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Empleados;
use Illuminate\Support\Facades\Mail;
use App\Mail\RecoveryPasswordEmail;
use Session;
use Illuminate\Support\Str;
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

    public function recoveryPassword()
    {
        return view("user.recoverypassword");
    }

    public function setNewPassword()
    {
        return view("user.newpassword");
    }


    public function setPassword(Request $request)
    {
        $id = Session::get("id");
        $user = User::where("id", $id)->first();
        $user->temp_password = "";
        $user->is_recovery = 0;
        $user->password = Hash::make($request->password);
        $user->save();
        return Redirect("/dashboard");
    }


    public function sendEmailRecoveryPassword(Request $request)
    {  
        $user = User::where("email", $request->email)->first();
        if(!empty($user)){
            $random2 = Str::random(6);
            $user->temp_password = Hash::make($random2);
            $user->is_recovery = 1;
            $user->save();

            Mail::to($user->email)
            ->send(new RecoveryPasswordEmail($random2));
        }
        return redirect("/login");
    }

    public function login(Request $request)
    {
        $username = $request->email;
        $password = $request->password;

        $user = User::where("email", $username)->first();
        if (!empty($user->id)) {
            $id_empleado_usuario = $user->id_empleado_usuario;
            if (!Hash::check($password, $user->password)){
                if($user->is_recovery==false){
                    return Redirect("/login");
                }
                else {
                    if(Hash::check($password, $user->temp_password)){
                        $this->setSessionEmpleado($user);
                        return Redirect("/set-new-password");
                    }
                    else{
                        return Redirect("/login");
                    }
                }
            }
                


            $this->setSessionEmpleado($user);
            return Redirect("/dashboard");
        }
        return Redirect("/login");

    }

    private function setSessionEmpleado($user){
        $empleados = Empleados::findOrFail($user->id_empleado_usuario);
        $session = session();
        $session->put('id', $user->id);
        $session->put('id_empleado_usuario', $user->id_empleado_usuario);
        $session->put('email', $user->email);
        $session->put('name', $empleados->nombre_empleado);

        Auth::login($user, true);
    }
}