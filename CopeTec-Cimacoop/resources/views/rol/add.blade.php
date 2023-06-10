@extends('base.base')
@section('title')
    Agregar Rol
@endsection
@section('content')
    <form action="/rol/add" method="post" autocomplete="nope">
        {!! csrf_field() !!}
        <div class="input-group mb-5"></div>

        <!--begin::row group-->
        <div class="form-group row mb-5">
            <div class="form-floating col-lg-8">
                <input type="text" required class="form-control" placeholder="name" name="name" />
                <label>Nombre Rol:</label>
            </div>
            <div class="form-floating col-lg-4">
                <button type="submit" class="btn btn-bg-primary btn-text-white">Agrega Rol</button>
            </div>

        </div>


    </form>
@endsection
