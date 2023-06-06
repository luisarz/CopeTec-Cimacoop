@extends('base.base')
@section("title")
Editar Rol
@endsection
@section('content')
    <form action="/rol/put" method="post" autocomplete="nope">
        {!! csrf_field() !!}
        {{ method_field('PUT') }}
        <input type="hidden" name="id" value="{{$rol->id}}">
        <div class="input-group mb-5"></div>
        <!--begin::Input group-->
        <div class="input-group mb-5">
            <span class="input-group-text" id="basic-addon1">
                <i class="ki-duotone ki-profile-circle fs-1"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i>
            </span>
            <input required  value="{{$rol->name}}" type="text" class="form-control" name="name" placeholder="Nombre" aria-label="Nombre" aria-describedby="basic-addon1"/>
        </div>
        <div class="card-footer d-flex justify-content-end py-6">
            <button type="submit" class="btn btn-bg-primary btn-text-white">Modificar</button>
        </div>
    </form>
@endsection