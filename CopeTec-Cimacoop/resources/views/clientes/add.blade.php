@extends('base.base')
@section("title")
Agregar Cliente
@endsection
@section('content')
    <form action="/clientes/add" method="post" autocomplete="nope">
        {!! csrf_field() !!}
        <div class="input-group mb-5"></div>
          <!--begin::Input group-->
            <div class="input-group mb-5">
                <span class="input-group-text" id="basic-addon1">
                    <i class="ki-duotone ki-profile-circle fs-1"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i>
                </span>
                <input required type="text" class="form-control" name="nombre" placeholder="nombre" aria-label="nombre" aria-describedby="basic-addon1"/>
            </div>
       
        <!--begin::Input group-->
            <div class="input-group mb-5">
                <span class="input-group-text" id="basic-addon1">
                    <i class="ki-duotone ki-profile-circle fs-1"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i>
                </span>
                <input required type="text" class="form-control" name="genero" placeholder="genero" aria-label="genero" aria-describedby="basic-addon1"/>
            </div>
        <!--begin::Input group-->
        <div class="input-group mb-5">
            <span class="input-group-text" id="basic-addon1">
                <i class="ki-duotone ki-profile-circle fs-1"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i>
            </span>
            <input required type="date" class="form-control" name="fecha_nacimiento" placeholder="fecha_nacimiento" aria-label="fecha_nacimiento" aria-describedby="basic-addon1"/>
        </div>
        <!--begin::Input group-->
        <div class="input-group mb-5">
            <span class="input-group-text" id="basic-addon1">
                <i class="ki-duotone ki-profile-circle fs-1"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i>
            </span>
            <input required type="text" class="form-control" name="dui_cliente" placeholder="dui_cliente" aria-label="dui_cliente" aria-describedby="basic-addon1"/>
        </div>
        <!--begin::Input group-->
        <div class="input-group mb-5">
            <span class="input-group-text" id="basic-addon1">
                <i class="ki-duotone ki-profile-circle fs-1"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i>
            </span>
            <input required type="text" class="form-control" name="dui_extendido" placeholder="dui_extendido" aria-label="dui_extendido" aria-describedby="basic-addon1"/>
        </div>
        <!--begin::Input group-->
        <div class="input-group mb-5">
            <span class="input-group-text" id="basic-addon1">
                <i class="ki-duotone ki-profile-circle fs-1"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i>
            </span>
            <input required type="date" class="form-control" name="fecha_expedicion" placeholder="fecha_expedicion" aria-label="fecha_expedicion" aria-describedby="basic-addon1"/>
        </div>
        <!--begin::Input group-->
        <div class="input-group mb-5">
            <span class="input-group-text" id="basic-addon1">
                <i class="ki-duotone ki-profile-circle fs-1"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i>
            </span>
            <input required type="text" class="form-control" name="nacionalidad" placeholder="nacionalidad" aria-label="nacionalidad" aria-describedby="basic-addon1"/>
        </div>

         <!--begin::Input group-->
        <div class="input-group mb-5">
            <span class="input-group-text" id="basic-addon1">
                <i class="ki-duotone ki-profile-circle fs-1"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i>
            </span>
            <input required type="text" class="form-control" name="estado_civil" placeholder="estado_civil" aria-label="estado_civil" aria-describedby="basic-addon1"/>
        </div>
         <!--begin::Input group-->
        <div class="input-group mb-5">
            <span class="input-group-text" id="basic-addon1">
                <i class="ki-duotone ki-profile-circle fs-1"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i>
            </span>
            <input required type="text" class="form-control" name="direccion_personal" placeholder="direccion_personal" aria-label="direccion_personal" aria-describedby="basic-addon1"/>
        </div>
         <!--begin::Input group-->
        <div class="input-group mb-5">
            <span class="input-group-text" id="basic-addon1">
                <i class="ki-duotone ki-profile-circle fs-1"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i>
            </span>
            <input required type="text" class="form-control" name="direccion_negocio" placeholder="direccion_negocio" aria-label="direccion_negocio" aria-describedby="basic-addon1"/>
        </div>
         <!--begin::Input group-->
        <div class="input-group mb-5">
            <span class="input-group-text" id="basic-addon1">
                <i class="ki-duotone ki-profile-circle fs-1"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i>
            </span>
            <input required type="text" class="form-control" name="nombre_negocio" placeholder="nombre_negocio" aria-label="nombre_negocio" aria-describedby="basic-addon1"/>
        </div>
    <!--begin::Input group-->
        <div class="input-group mb-5">
            <span class="input-group-text" id="basic-addon1">
                <i class="ki-duotone ki-profile-circle fs-1"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i>
            </span>
            <input required type="text" class="form-control" name="tipo_vivienda" placeholder="tipo_vivienda" aria-label="tipo_vivienda" aria-describedby="basic-addon1"/>
        </div>
         <!--begin::Input group-->
        <div class="input-group mb-5">
            <span class="input-group-text" id="basic-addon1">
                <i class="ki-duotone ki-profile-circle fs-1"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i>
            </span>
            <input required type="text" class="form-control" name="observaciones" placeholder="observaciones" aria-label="observaciones" aria-describedby="basic-addon1"/>
        </div>


        <div class="card-footer d-flex justify-content-end py-6">
            <button type="submit" class="btn btn-bg-primary btn-text-white">Agregar</button>
        </div>
    </form>
@endsection