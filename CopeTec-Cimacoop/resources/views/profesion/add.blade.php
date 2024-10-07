@extends('base.base')
@section('title')
    Agregar Rol
@endsection
@section('content')
    <div class="card">
        <div class="card-header">Nuea profesion</div>
        <div class="card-body">
            <form action="/profesiones/add" method="post" autocomplete="nope">
                {!! csrf_field() !!}
                <div class="input-group mb-5"></div>

                <!--begin::row group-->
                <div class="form-group row mb-5">
                    <div class="form-floating col-lg-8">
                        <input type="text" required class="form-control" placeholder="name" name="name" />
                        <label>Nombre Profession:</label>
                    </div>
                    <div class="form-floating col-lg-4">
                        <button type="submit" class="btn btn-bg-primary btn-text-white">Agrega Rol</button>
                    </div>

                </div>


            </form>
        </div>
    </div>
@endsection
