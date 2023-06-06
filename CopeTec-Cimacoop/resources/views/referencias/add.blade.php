@extends('base.base')
@section("title")
Agregar Cliente
@endsection
@section('content')
    <form action="/referencias/add" method="post" autocomplete="nope">
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
                <input required type="text" class="form-control" name="parentesco" placeholder="parentesco" aria-label="parentesco" aria-describedby="basic-addon1"/>
            </div>
        <!--begin::Input group-->
        <div class="input-group mb-5">
            <span class="input-group-text" id="basic-addon1">
                <i class="ki-duotone ki-profile-circle fs-1"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i>
            </span>
            <input required type="telf" class="form-control" name="telefono" placeholder="telefono" aria-label="telefono" aria-describedby="basic-addon1"/>
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
            <input required type="text" class="form-control" name="lugar_trabajo" placeholder="lugar_trabajo" aria-label="lugar_trabajo" aria-describedby="basic-addon1"/>
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