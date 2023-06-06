@extends('base.base')
@section("title")
Agregar Tipo Cuenta
@endsection
@section('content')
    <form action="/empleados/add" method="post" autocomplete="nope">
        {!! csrf_field() !!}
        <div class="input-group mb-5"></div>
          <!--begin::Input group-->
            <div class="input-group mb-5">
                <span class="input-group-text" id="basic-addon1">
                    <i class="ki-duotone ki-profile-circle fs-1"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i>
                </span>
                <input required type="text" class="form-control" name="nombre_empleado" placeholder="nombre_empleado" aria-label="nombre_empleado" aria-describedby="basic-addon1"/>
            </div>
       
        <!--begin::Input group-->
            <div class="input-group mb-5">
                <span class="input-group-text" id="basic-addon1">
                    <i class="ki-duotone ki-profile-circle fs-1"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i>
                </span>
                <input required type="text" class="form-control" name="genero_empleado" placeholder="genero_empleado" aria-label="genero_empleado" aria-describedby="basic-addon1"/>
            </div>
        <!--begin::Input group-->
        <div class="input-group mb-5">
            <span class="input-group-text" id="basic-addon1">
                <i class="ki-duotone ki-profile-circle fs-1"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i>
            </span>
            <input required type="text" class="form-control" name="estado_familiar" placeholder="estado_familiar" aria-label="estado_familiar" aria-describedby="basic-addon1"/>
        </div>
        <!--begin::Input group-->
        <div class="input-group mb-5">
            <span class="input-group-text" id="basic-addon1">
                <i class="ki-duotone ki-profile-circle fs-1"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i>
            </span>
            <input required type="text" class="form-control" name="profesion" placeholder="profesion" aria-label="profesion" aria-describedby="basic-addon1"/>
        </div>
        <!--begin::Input group-->
        <div class="input-group mb-5">
            <span class="input-group-text" id="basic-addon1">
                <i class="ki-duotone ki-profile-circle fs-1"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i>
            </span>
            <input required type="text" class="form-control" name="domicilio_departamento" placeholder="domicilio_departamento" aria-label="Nombre" aria-describedby="basic-addon1"/>
        </div>
        <!--begin::Input group-->
        <div class="input-group mb-5">
            <span class="input-group-text" id="basic-addon1">
                <i class="ki-duotone ki-profile-circle fs-1"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i>
            </span>
            <input required type="text" class="form-control" name="direccion" placeholder="direccion" aria-label="direccion" aria-describedby="basic-addon1"/>
        </div>
        <!--begin::Input group-->
        <div class="input-group mb-5">
            <span class="input-group-text" id="basic-addon1">
                <i class="ki-duotone ki-profile-circle fs-1"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i>
            </span>
            <input required type="text" class="form-control" name="nacionalidad" placeholder="nacionalidad" aria-label="Nombre" aria-describedby="basic-addon1"/>
        </div>

         <!--begin::Input group-->
        <div class="input-group mb-5">
            <span class="input-group-text" id="basic-addon1">
                <i class="ki-duotone ki-profile-circle fs-1"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i>
            </span>
            <input required type="text" class="form-control" name="dui" placeholder="dui" aria-label="dui" aria-describedby="basic-addon1"/>
        </div>
         <!--begin::Input group-->
        <div class="input-group mb-5">
            <span class="input-group-text" id="basic-addon1">
                <i class="ki-duotone ki-profile-circle fs-1"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i>
            </span>
            <input required type="text" class="form-control" name="expedicion_dui" placeholder="expedicion_dui" aria-label="expedicion_dui" aria-describedby="basic-addon1"/>
        </div>
         <!--begin::Input group-->
        <div class="input-group mb-5">
            <span class="input-group-text" id="basic-addon1">
                <i class="ki-duotone ki-profile-circle fs-1"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i>
            </span>
            <input required type="text" class="form-control" name="nit" placeholder="nit" aria-label="Nombre" aria-describedby="basic-addon1"/>
        </div>
         <!--begin::Input group-->
        <div class="input-group mb-5">
            <span class="input-group-text" id="basic-addon1">
                <i class="ki-duotone ki-profile-circle fs-1"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i>
            </span>
            <input required type="text" class="form-control" name="otros_datos" placeholder="otros_datos" aria-label="Nombre" aria-describedby="basic-addon1"/>
        </div>


        <div class="card-footer d-flex justify-content-end py-6">
            <button type="submit" class="btn btn-bg-primary btn-text-white">Agregar</button>
        </div>
    </form>
@endsection