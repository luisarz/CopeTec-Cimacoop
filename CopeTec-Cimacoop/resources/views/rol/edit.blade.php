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
     

          <!--begin::row group-->
        <div class="form-group row mb-5">
            <div class="form-floating col-lg-8">
                <input type="text" value="{{$rol->name}}" required class="form-control" placeholder="name" name="name" />
                <label>Nombre Rol:</label>
            </div>
            <div class="form-floating col-lg-4">
                <button type="submit" class="btn btn-bg-primary btn-text-white">Modificar</button>
            </div>

        </div>
      
    </form>
@endsection