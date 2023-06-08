@extends('base.base')
@section("title")
Editar Usuario
@endsection
@section('content')
    <form action="/user/put" method="post" autocomplete="nope">
        {!! csrf_field() !!}
        {{ method_field('PUT') }}
        <input type="hidden" name="id" value="{{$user->id}}">
        <div class="card-body">
            <!--begin::row group-->
            <div class="form-group row mb-5">
                <div class="col-lg-12">
                    <label>Empleado:</label>
                    <select required name="id_empleado_usuario" class="form-control select2">
                        <option value="">Seleccione</option>
                        @foreach ($empleados as $empleado)
                        {{$user->id_empleado}}
                             @if ($user->id_empleado_usuario == $empleado->id_empleado)
                                {
                                <option selected value="{{ $empleado->id_empleado }}">{{ $empleado->nombre_empleado }} -
                                    {{ $empleado->dui }}
                                </option>
                            }@else{
                                <option value="{{ $empleado->id_empleado }}">{{ $empleado->nombre_empleado }} -
                                    {{ $empleado->dui }}
                                    }
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>
            <!--begin::row group-->
            <div class="form-group row mb-5">
                <div class="col-lg-4">
                    <label>Email:</label>
                    <input required type="text" value="{{$user->password}}" class="form-control" name="email" placeholder="Nombre"
                        aria-label="Nombre" aria-describedby="basic-addon1" />
                </div>
                <div class="col-lg-4">
                    <label>Password:</label>
                    <input required type="password"  class="form-control" name="password" placeholder="password"
                        aria-label="password" aria-describedby="basic-addon1" />
                </div>
                <div class="col-lg-4">
                    <label>Repetir Password:</label>
                    <input required type="password"  class="form-control" name="password" placeholder="Repetir password"
                        aria-label="password" aria-describedby="basic-addon1" />
                </div>
            </div>
        </div>
        <div class="card-footer d-flex justify-content-end py-6">
            <button type="submit" class="btn btn-bg-primary btn-text-white">Modificar</button>
        </div>
    </form>
@endsection