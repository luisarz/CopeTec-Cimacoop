@extends('base.base')
@section('title')
    Editar Rol
@endsection
@section('content')
    <form action="/contabilidad/tipos-partidas/add" method="post" autocomplete="nope">
        {!! csrf_field() !!}
        <input type="hidden" name="id">
        <div class="input-group mb-5"></div>


        <!--begin::row group-->
        <div class="form-group row mb-5">
            <div class="form-floating col-lg-8">
                <input type="text"  required class="form-control" placeholder="name"
                    name="descripcion" />
                <label>TIPO CUENTA:</label>
            </div>
            <div class="form-floating col-lg-4">
                <button type="submit" class="btn btn-bg-primary btn-text-white">AGREGAR TIPO DE PARTIDA</button>
            </div>

        </div>

    </form>
@endsection
