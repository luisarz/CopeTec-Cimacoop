@extends('base.base')
@section("title")
Editar Cliente
@endsection
@section('content')
    <form action="/clientes/put" method="post" autocomplete="nope">
        {!! csrf_field() !!}
        {{ method_field('PUT') }}
        <input type="hidden" name="id" value="{{$cliente->id_cliente}}">
        <div class="input-group mb-5"></div>
        <!--begin::Input group-->
        <div class="input-group mb-5">
            <span class="input-group-text" id="basic-addon1">
                <i class="ki-duotone ki-profile-circle fs-1"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i>
            </span>
            <input required  value="{{$cliente->nombre}}" type="text" class="form-control" name="nombre" placeholder="nombre" aria-label="Nombre" aria-describedby="basic-addon1"/>
        </div>
         <!--begin::Input group-->
        <div class="input-group mb-5">
            <span class="input-group-text" id="basic-addon1">
                <i class="ki-duotone ki-profile-circle fs-1"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i>
            </span>
            <input required  value="{{$cliente->genero}}" type="text" class="form-control" name="genero" placeholder="genero" aria-label="Nombre" aria-describedby="basic-addon1"/>
        </div>
         <!--begin::Input group-->
        <div class="input-group mb-5">
            <span class="input-group-text" id="basic-addon1">
                <i class="ki-duotone ki-profile-circle fs-1"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i>
            </span>
            <input required  value="{{$cliente->fecha_nacimiento}}" type="date" class="form-control" name="fecha_nacimiento" placeholder="fecha_nacimiento" aria-label="Nombre" aria-describedby="basic-addon1"/>
        </div>
         <!--begin::Input group-->
        <div class="input-group mb-5">
            <span class="input-group-text" id="basic-addon1">
                <i class="ki-duotone ki-profile-circle fs-1"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i>
            </span>
            <input required  value="{{$cliente->dui_cliente}}" type="text" class="form-control" name="dui_cliente" placeholder="dui_cliente" aria-label="dui_cliente" aria-describedby="basic-addon1"/>
        </div>
         <!--begin::Input group-->
        <div class="input-group mb-5">
            <span class="input-group-text" id="basic-addon1">
                <i class="ki-duotone ki-profile-circle fs-1"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i>
            </span>
            <input required  value="{{$cliente->dui_extendido}}" type="text" class="form-control" name="dui_extendido" placeholder="dui_extendido" aria-label="dui_extendido" aria-describedby="basic-addon1"/>
        </div>
         <!--begin::Input group-->
        <div class="input-group mb-5">
            <span class="input-group-text" id="basic-addon1">
                <i class="ki-duotone ki-profile-circle fs-1"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i>
            </span>
            <input required  value="{{$cliente->fecha_expedicion}}" type="date" class="form-control" name="fecha_expedicion" placeholder="fecha_expedicion" aria-label="fecha_expedicion" aria-describedby="basic-addon1"/>
        </div>
            <!--begin::Input group-->
        <div class="input-group mb-5">
            <span class="input-group-text" id="basic-addon1">
                <i class="ki-duotone ki-profile-circle fs-1"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i>
            </span>
            <input required  value="{{$cliente->telefono}}" type="text" class="form-control" name="telefono" placeholder="telefono" aria-label="fecha_expedicion" aria-describedby="basic-addon1"/>
        </div>
         <!--begin::Input group-->
        <div class="input-group mb-5">
            <span class="input-group-text" id="basic-addon1">
                <i class="ki-duotone ki-profile-circle fs-1"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i>
            </span>
            <input required  value="{{$cliente->direccion_personal}}" type="text" class="form-control" name="direccion_personal" placeholder="direccion_personal" aria-label="direccion_personal" aria-describedby="basic-addon1"/>
        </div>
         <!--begin::Input group-->
        <div class="input-group mb-5">
            <span class="input-group-text" id="basic-addon1">
                <i class="ki-duotone ki-profile-circle fs-1"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i>
            </span>
            <input required  value="{{$cliente->direccion_negocio}}" type="text" class="form-control" name="direccion_negocio" placeholder="direccion_negocio" aria-label="Nombre" aria-describedby="basic-addon1"/>
        </div>
         <!--begin::Input group-->
        <div class="input-group mb-5">
            <span class="input-group-text" id="basic-addon1">
                <i class="ki-duotone ki-profile-circle fs-1"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i>
            </span>
            <input required  value="{{$cliente->nombre_negocio}}" type="text" class="form-control" name="nombre_negocio" placeholder="nombre_negocio" aria-label="Nombre" aria-describedby="basic-addon1"/>
        </div>
          <!--begin::Input group-->
        <div class="input-group mb-5">
            <span class="input-group-text" id="basic-addon1">
                <i class="ki-duotone ki-profile-circle fs-1"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i>
            </span>
            <input required  value="{{$cliente->tipo_vivienda}}" type="text" class="form-control" name="tipo_vivienda" placeholder="tipo_vivienda" aria-label="Nombre" aria-describedby="basic-addon1"/>
        </div>
          <!--begin::Input group-->
        <div class="input-group mb-5">
            <span class="input-group-text" id="basic-addon1">
                <i class="ki-duotone ki-profile-circle fs-1"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i>
            </span>
            <input required  value="{{$cliente->observaciones}}" type="text" class="form-control" name="observaciones" placeholder="observaciones" aria-label="Nombre" aria-describedby="basic-addon1"/>
        </div>
        
     

        <div class="card-footer d-flex justify-content-end py-6">
            <button type="submit" class="btn btn-bg-primary btn-text-white">Modificar</button>
        </div>
    </form>
@endsection