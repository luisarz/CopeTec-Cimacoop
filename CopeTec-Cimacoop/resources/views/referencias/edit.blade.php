@extends('base.base')
@section("title")
Editar Cliente
@endsection
@section('formName')
<i class="flaticon2-user"></i>
Administracion de Referencias
@endsection
@section('content')
    <form action="/referencias/put" method="post" autocomplete="nope">
        {!! csrf_field() !!}
        {{ method_field('PUT') }}
        <input type="hidden" name="id" value="{{$referencia->id_referencia}}">
        <div class="input-group mb-5"></div>
        <!--begin::Input group-->
        <div class="input-group mb-5">
            <span class="input-group-text" id="basic-addon1">
                <i class="ki-duotone ki-profile-circle fs-1"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i>
            </span>
            <input required  value="{{$referencia->nombre}}" type="text" class="form-control" name="nombre" placeholder="nombre" aria-label="Nombre" aria-describedby="basic-addon1"/>
        </div>
         <!--begin::Input group-->
        <div class="input-group mb-5">
            <span class="input-group-text" id="basic-addon1">
                <i class="ki-duotone ki-profile-circle fs-1"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i>
            </span>
            <input required  value="{{$referencia->parentesco}}" type="text" class="form-control" name="parentesco" placeholder="parentesco" aria-label="Nombre" aria-describedby="basic-addon1"/>
        </div>
         <!--begin::Input group-->
        <div class="input-group mb-5">
            <span class="input-group-text" id="basic-addon1">
                <i class="ki-duotone ki-profile-circle fs-1"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i>
            </span>
            <input required  value="{{$referencia->telefono}}" type="text" class="form-control" name="telefono" placeholder="telefono" aria-label="Nombre" aria-describedby="basic-addon1"/>
        </div>
         <!--begin::Input group-->
        <div class="input-group mb-5">
            <span class="input-group-text" id="basic-addon1">
                <i class="ki-duotone ki-profile-circle fs-1"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i>
            </span>
            <input required  value="{{$referencia->direccion}}" type="text" class="form-control" name="direccion" placeholder="direccion" aria-label="dui_cliente" aria-describedby="basic-addon1"/>
        </div>
         <!--begin::Input group-->
        <div class="input-group mb-5">
            <span class="input-group-text" id="basic-addon1">
                <i class="ki-duotone ki-profile-circle fs-1"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i>
            </span>
            <input required  value="{{$referencia->lugar_trabajo}}" type="text" class="form-control" name="lugar_trabajo" placeholder="lugar_trabajo" aria-label="dui_extendido" aria-describedby="basic-addon1"/>
        </div>
         <!--begin::Input group-->
        <div class="input-group mb-5">
            <span class="input-group-text" id="basic-addon1">
                <i class="ki-duotone ki-profile-circle fs-1"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i>
            </span>
            <input required  value="{{$referencia->observaciones}}" type="text" class="form-control" name="observaciones" placeholder="observaciones" aria-label="fecha_expedicion" aria-describedby="basic-addon1"/>
        </div>

        <div class="card-footer d-flex justify-content-end py-6">
            <button type="submit" class="btn btn-bg-primary btn-text-white">Modificar</button>
        </div>
    </form>
@endsection