@extends('base.base')
@section('title')
    Editar Rol
@endsection
@section('content')
    <form action="/contabilidad/tipos-partidas/put" method="post" autocomplete="nope">
        {!! csrf_field() !!}
        {{ method_field('PUT') }}
        <input type="hidden" name="id" value="{{ $tipoPartida->id_tipo_partida }}">
        <div class="input-group mb-5"></div>


        <!--begin::row group-->
        <div class="form-group row mb-5">
            <div class="form-floating col-lg-8">
                <input type="text" value="{{ $tipoPartida->descripcion }}" required class="form-control" placeholder="name"
                    name="descripcion" />
                <label>TIPO CUENTA:</label>
            </div>
            <div class="form-floating col-lg-4">
                <button type="submit" class="btn btn-bg-primary btn-text-white">Modificar</button>
            </div>

        </div>

    </form>
@endsection
