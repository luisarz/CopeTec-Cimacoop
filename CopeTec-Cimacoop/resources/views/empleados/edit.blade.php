@extends('base.base')
@section("title")
    Editar Tipo Cuenta
@endsection
@section('content')
    <div class="card shadow-lg">

        <div class="card-header ribbon ribbon-end ribbon-clip">
            <div class="card-toolbar">
                <a href="/empleados" class="btn btn-info"><i class="fa-solid fa-arrow-left"></i> Regresar</a>
            </div>
            <div class="ribbon-label fs-3">
                <i class="ki-outline
                    {{ Session::get('icon_menu') }} text-white fs-2x"></i> &nbsp;
                Modificar | {{ Session::get('name_module') }}
                <span class="ribbon-inner bg-info"></span>
            </div>
        </div>
        <div class="card-body">
            <form action="/empleados/put" method="post" autocomplete="nope">
                {!! csrf_field() !!}
                {!! csrf_field() !!}
                {{ method_field('PUT') }}
                <input type="hidden" name="id" value="{{$empleado->id_empleado}}">
                <!--begin::Input group-->
                <div class="form-group row mb-5">
                    <div class="form-floating col-md-6">
                        <input required type="text" class="form-control" value="{{$empleado->nombre_empleado}}" name="nombre_empleado"
                               placeholder="nombre_empleado" aria-label="nombre_empleado"
                               aria-describedby="basic-addon1"/>
                        <label>Nombre</label>
                    </div>
                    <div class="form-floating col-md-6">
                        <select name="genero_empleado" class="form-select form-select-solid form-select-lg fw-bold"
                                aria-label="select example">
                            <option value="M" {{$empleado->genero_empleado=='M'?'selected':''}}>Masculino</option>
                            <option value="F" {{$empleado->genero_empleado=='F'?'selected':''}}>Femenino</option>
                        </select>
                        <label>Genero</label>
                    </div>
                </div>

                <div class="form-group row mb-5">
                    <div class="form-floating col-md-6">
                        <input required type="text" class="form-control" name="estado_familiar"
                               placeholder="estado_familiar" value="{{$empleado->estado_familiar}}" aria-label="estado_familiar"
                               aria-describedby="basic-addon1"/>
                        <label>Estado Familiar</label>
                    </div>
                    <div class="form-floating col-md-6">
                        <select name="profesion_id" class="form-select form-select-solid form-select-lg fw-bold"
                                aria-label="select example" data-control="select2">
                            @foreach($profesiones as $profesion)
                                <option value="{{ $profesion->id }}">{{ $profesion->name }}</option>
                            @endforeach
                        </select>
                        <label>Profesion</label>
                    </div>
                </div>
                <!--begin::Input group-->

                <div class="form-group row mb-5">
                    <div class="form-floating col-md-6">
                        <input required type="text" class="form-control" value="{{$empleado->domicilio_departamento}}" name="domicilio_departamento"
                               placeholder="domicilio_departamento" aria-label="domicilio_departamento"
                               aria-describedby="basic-addon1"/>
                        <label>Domicilio Departamento</label>
                    </div>
                    <div class="form-floating col-md-6">
                        <input required type="text" class="form-control" value="{{$empleado->direccion}}" name="direccion" placeholder="direccion"
                               aria-label="direccion" aria-describedby="basic-addon1"/>
                        <label>Direccion</label>
                    </div>
                </div>

                <!--begin::Input group-->
                <div class="form-group  row mb-5">
                    <div class="form-floating col-md-6">
                        <input required type="text" class="form-control" value="{{$empleado->nacionalidad}}" name="nacionalidad" placeholder="nacionalidad"
                               aria-label="Nombre" aria-describedby="basic-addon1"/>
                        <label>Nacionalidad</label>
                    </div>
                    <div class="form-floating col-md-6">
                        <input required type="text" class="form-control" value="{{$empleado->dui}}"  name="dui" placeholder="dui" aria-label="dui"
                               aria-describedby="basic-addon1"/>
                        <label>DUI</label>
                    </div>
                </div>


                <!--begin::Input group-->
                <div class="form-group row mb-5">
                    <div class="form-floating col-md-6">
                        <input required type="text" class="form-control" value="{{$empleado->expedicion_dui}}" name="expedicion_dui" placeholder="telefono"
                               aria-label="Nombre" aria-describedby="basic-addon1"/>
                        <label>Expedición DUI</label>
                    </div>
                    <div class="form-floating col-md-6">
                        <input required type="text" class="form-control" value="{{$empleado->nit}}" name="nit" placeholder="nit"
                               aria-label="Nombre" aria-describedby="basic-addon1"/>
                        <label>NIT</label>
                    </div>
                </div>
                <div class="form-group row mb-5">
                    <div class="form-floating col-md-6">
                        <input required type="text" class="form-control" value="{{$empleado->telefono}}" name="telefono" placeholder="telefono"
                               aria-label="Nombre" aria-describedby="basic-addon1"/>
                        <label>Telefono</label>
                    </div>
                    <div class="form-floating col-md-6">
                        <input required type="text" class="form-control" value="{{$empleado->otros_datos}}" name="otros_datos" placeholder="Otros Datos"
                               aria-label="Nombre" aria-describedby="basic-addon1"/>
                        <label>Otros Datos</label>
                    </div>

                    <div class="card-footer d-flex justify-content-end py-6">
                        <button type="submit" class="w-100 btn btn-bg-primary btn-text-white">Modificar</button>
                    </div>
            </form>
        </div>
    </div>
@endsection