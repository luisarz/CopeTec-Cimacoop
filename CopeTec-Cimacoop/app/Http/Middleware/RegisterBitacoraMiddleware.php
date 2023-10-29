<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use \App\Models\Bitacora;
use Illuminate\Support\Facades\URL;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Session;

class RegisterBitacoraMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(Session::get("access")==null){
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

        //dd($request->getMethod());
        foreach (Session::get('access') as $access)
        {
            if($request->getPathInfo() == $access->ruta){
                Session::put("active_menu",$access->id_modulo);
                Session::put("icon_menu", $access->icono);
                Session::put("estadoMenuminimizado", $access->is_minimazed);
                Session::put("name_module", $access->nombre);
                Session::put("active_menu_padre",$access->id_padre);

              

            }
        }
          if (str_ends_with($request->getHost(), '.ngrok-free.app')) {
            URL::forceScheme('https');
            // dd($request->getHost());
        }

        return $next($request);
    }
}
