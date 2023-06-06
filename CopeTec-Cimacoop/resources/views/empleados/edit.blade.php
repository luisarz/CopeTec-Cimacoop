@extends('base.base')
@section("title")
Editar Tipo Cuenta
@endsection
@section('content')
    <form action="/empleados/put" method="post" autocomplete="nope">
        {!! csrf_field() !!}
        {{ method_field('PUT') }}
        <input type="hidden" name="id" value="{{$empleado->id_empleado}}">
        <div class="input-group mb-5"></div>
        <!--begin::Input group-->
        <div class="input-group mb-5">
            <span class="input-group-text" id="basic-addon1">
                <i class="ki-duotone ki-profile-circle fs-1"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i>
            </span>
            <input required  value="{{$empleado->nombre_empleado}}" type="text" class="form-control" name="nombre_empleado" placeholder="Nombre" aria-label="Nombre" aria-describedby="basic-addon1"/>
        </div>
         <!--begin::Input group-->
        <div class="input-group mb-5">
            <span class="input-group-text" id="basic-addon1">
                <i class="ki-duotone ki-profile-circle fs-1"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i>
            </span>
            <input required  value="{{$empleado->genero_empleado}}" type="text" class="form-control" name="genero_empleado" placeholder="Nombre" aria-label="Nombre" aria-describedby="basic-addon1"/>
        </div>
         <!--begin::Input group-->
        <div class="input-group mb-5">
            <span class="input-group-text" id="basic-addon1">
                <i class="ki-duotone ki-profile-circle fs-1"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i>
            </span>
            <input required  value="{{$empleado->estado_familiar}}" type="text" class="form-control" name="estado_familiar" placeholder="Nombre" aria-label="Nombre" aria-describedby="basic-addon1"/>
        </div>
         <!--begin::Input group-->
        <div class="input-group mb-5">
            <span class="input-group-text" id="basic-addon1">
                <i class="ki-duotone ki-profile-circle fs-1"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i>
            </span>
            <input required  value="{{$empleado->profesion}}" type="text" class="form-control" name="profesion" placeholder="Nombre" aria-label="Nombre" aria-describedby="basic-addon1"/>
        </div>
         <!--begin::Input group-->
        <div class="input-group mb-5">
            <span class="input-group-text" id="basic-addon1">
                <i class="ki-duotone ki-profile-circle fs-1"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i>
            </span>
            <input required  value="{{$empleado->domicilio_departamento}}" type="text" class="form-control" name="domicilio_departamento" placeholder="Nombre" aria-label="Nombre" aria-describedby="basic-addon1"/>
        </div>
         <!--begin::Input group-->
        <div class="input-group mb-5">
            <span class="input-group-text" id="basic-addon1">
                <i class="ki-duotone ki-profile-circle fs-1"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i>
            </span>
            <input required  value="{{$empleado->direccion}}" type="text" class="form-control" name="direccion" placeholder="Nombre" aria-label="Nombre" aria-describedby="basic-addon1"/>
        </div>
         <!--begin::Input group-->
        <div class="input-group mb-5">
            <span class="input-group-text" id="basic-addon1">
                <i class="ki-duotone ki-profile-circle fs-1"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i>
            </span>
            <input required  value="{{$empleado->nacionalidad}}" type="text" class="form-control" name="nacionalidad" placeholder="Nombre" aria-label="Nombre" aria-describedby="basic-addon1"/>
        </div>
         <!--begin::Input group-->
        <div class="input-group mb-5">
            <span class="input-group-text" id="basic-addon1">
                <i class="ki-duotone ki-profile-circle fs-1"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i>
            </span>
            <input required  value="{{$empleado->dui}}" type="text" class="form-control" name="dui" placeholder="Nombre" aria-label="Nombre" aria-describedby="basic-addon1"/>
        </div>
         <!--begin::Input group-->
        <div class="input-group mb-5">
            <span class="input-group-text" id="basic-addon1">
                <i class="ki-duotone ki-profile-circle fs-1"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i>
            </span>
            <input required  value="{{$empleado->expedicion_dui}}" type="text" class="form-control" name="expedicion_dui" placeholder="Nombre" aria-label="Nombre" aria-describedby="basic-addon1"/>
        </div>
          <!--begin::Input group-->
        <div class="input-group mb-5">
            <span class="input-group-text" id="basic-addon1">
                <i class="ki-duotone ki-profile-circle fs-1"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i>
            </span>
            <input required  value="{{$empleado->nit}}" type="text" class="form-control" name="nit" placeholder="Nombre" aria-label="Nombre" aria-describedby="basic-addon1"/>
        </div>
          <!--begin::Input group-->
        <div class="input-group mb-5">
            <span class="input-group-text" id="basic-addon1">
                <i class="ki-duotone ki-profile-circle fs-1"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i>
            </span>
            <input required  value="{{$empleado->otros_datos}}" type="text" class="form-control" name="otros_datos" placeholder="Nombre" aria-label="Nombre" aria-describedby="basic-addon1"/>
        </div>
     

        <div class="card-footer d-flex justify-content-end py-6">
            <button type="submit" class="btn btn-bg-primary btn-text-white">Modificar</button>
        </div>
    </form>
@endsection