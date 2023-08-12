<?php

namespace App\Http\Controllers;

use App\Models\Empleados;
use App\Models\Parameter;
use Illuminate\Http\Request;

class ParameterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $param = Parameter::all();
        return view('params.index', compact('param'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Parameter $parameter)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Parameter $parameter)
    {
        $param = Parameter::all();
        return view('params.form', compact('param'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Parameter $parameter)
    {
        $emp = Empleados::find(auth()->user()->id_empleado_usuario);
        $param = Parameter::find($request->id);
        $param->cuotas = $request->cuotas;
        $param->monto = $request->monto;
        $param->updated_by = $emp->nombre_empleado;
        if ($param->save()) {
            return redirect('/params');
        }else{
            
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Parameter $parameter)
    {
        //
    }
}
