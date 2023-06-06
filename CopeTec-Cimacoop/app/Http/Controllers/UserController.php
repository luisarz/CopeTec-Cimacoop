<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users=User::All();
        return view("user.index",compact("users"));   
    }

    public function add()
    {
        return view("user.add");   
    }


    public function post(Request $request)
    {
        $user = new User();
        $user->name = $request->name;
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

}
