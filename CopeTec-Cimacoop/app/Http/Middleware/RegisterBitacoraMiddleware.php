<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use \App\Models\Bitacora;
use Session;
use Symfony\Component\HttpFoundation\Response;

class RegisterBitacoraMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(session::get("access")==null){
            return redirect("/logout");
        }
        $bitacora = new Bitacora();
        $bitacora->route = $request->getPathInfo();
        $bitacora->request = json_encode($request->toArray());
        $bitacora->method = $request->getMethod();
        $bitacora->id_usuario = Session::get("id");
        $bitacora->nombre = Session::get("name");
        $bitacora->email = Session::get("email");
        $bitacora->fecha = date("Y-m-d H:i:s");

        $bitacora->save();

        return $next($request);
    }
}
