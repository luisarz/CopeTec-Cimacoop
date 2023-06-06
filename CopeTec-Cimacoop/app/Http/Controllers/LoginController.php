<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
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
        if(!empty($user)){
            if(!Hash::check($password,$user->password)) return Redirect("login");

            Auth::login($user, true);
            return Redirect("/dashboard");
        }
        return Redirect("login");
    }
}
