@extends('base.base')
@section("title")
Editar Cliente
@endsection
@section('formName')
<i class="flaticon2-user"></i>
Administracion de Referencias
@endsection
@section('content')
    <div class="card">
        <div class="card-header">
            <div class="card-toolbar">
                <a href="/referencias" class="btn btn-secondary"><i class="fa-solid fa-arrow-alt-circle-left"></i> Cancelar</a>

            </div>
            <h3 class="card-title">Editar Referencia</h3>
        </div>
        <div class="card-body">
            <form action="/referencias/put" method="post" autocomplete="nope">
                {!! csrf_field() !!}
                {{ method_field('PUT') }}
                <input type="hidden" name="id" value="{{$referencia->id_referencia}}">
                <div class="form-floating mb-5">

                    <input required  value="{{$referencia->nombre}}" type="text" class="form-control" name="nombre" placeholder="nombre" aria-label="Nombre" aria-describedby="basic-addon1"/>
                    <label>Nombre</label>
                </div>
                <!--begin::Input group-->
                <div class="form-floating mb-5">
                    <input required  value="{{$referencia->parentesco}}" type="text" class="form-control" name="parentesco" placeholder="parentesco" aria-label="Nombre" aria-describedby="basic-addon1"/>
            <label>DUI</label>
                </div>
                <!--begin::Input group-->
                <div class="form-floating mb-5">
                    <input required  value="{{$referencia->telefono}}" type="text" class="form-control" name="telefono" placeholder="telefono" aria-label="Nombre" aria-describedby="basic-addon1"/>
                    <label>Telefono</label>

                </div>
                <!--begin::Input group-->
                <div class="form-floating mb-5">
                    <input required  value="{{$referencia->direccion}}" type="text" class="form-control" name="direccion" placeholder="direccion" aria-label="dui_cliente" aria-describedby="basic-addon1"/>
                    <label>Dirección</label>
                </div>
                <!--begin::Input group-->
                <div class="form-floating mb-5">
                    <input required  value="{{$referencia->lugar_trabajo}}" type="text" class="form-control" name="lugar_trabajo" placeholder="lugar_trabajo" aria-label="dui_extendido" aria-describedby="basic-addon1"/>
                    <label>Lugar de Trabajo</label>

                </div>
                <!--begin::Input group-->
                <div class="form-floating mb-5">
                    <input required  value="{{$referencia->observaciones}}" type="text" class="form-control" name="observaciones" placeholder="observaciones" aria-label="fecha_expedicion" aria-describedby="basic-addon1"/>
                    <label>Observaciones</label>
                </div>

                <div class="card-footer d-flex justify-content-end py-6">
                    <button type="submit" class="w-100 btn btn-bg-primary btn-text-white">Modificar</button>
                </div>
            </form>
        </div>


    </div>
@endsection