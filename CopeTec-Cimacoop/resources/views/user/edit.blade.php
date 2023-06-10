@extends('base.base')
@section('title')
    Editar Usuario
@endsection
@section('content')
    <form action="/user/put" method="post" autocomplete="nope">
        {!! csrf_field() !!}
        {{ method_field('PUT') }}
        <input type="hidden" name="id" value="{{ $user->id }}">
        <div class="card-body">
            <!--begin::row group-->
            <div class="form-group row mb-5">
                <div class="form-floating col-lg-8">
                    <select required name="id_empleado_usuario" data-control="select2" class="form-select">
                        <option value="">Seleccione</option>
                        @foreach ($empleados as $empleado)
                            @if ($user->id_empleado_usuario == $empleado->id_empleado)
                                <option selected value="{{ $empleado->id_empleado }}">{{ $empleado->nombre_empleado }} -
                                    {{ $empleado->dui }}
                                </option>
                            @else
                                <option value="{{ $empleado->id_empleado }}">{{ $empleado->nombre_empleado }} -
                                    {{ $empleado->dui }}
                            @endif
                        @endforeach
                    </select>
                    <label>Empleado:</label>
                </div>
                <div class="form-floating col-lg-4">
                    <select required name="id_rol" value="{{ old('id_rol') }}" data-control="select2" class="form-select">
                        <option value="">Seleccione</option>
                        @foreach ($roles as $rol)
                            @if ($user->id_rol == $rol->id)
                                <option selected value="{{ $rol->id }}">{{ $rol->name }}
                                </option>
                            @else
                                <option value="{{ $rol->id }}">{{ $rol->name }}
                                </option>
                            @endif
                        @endforeach
                    </select>
                    <label>Rol:</label>
                </div>
            </div>
            <!--begin::row group-->
            <div class="form-group row mb-5">
                <div class="form-floating col-lg-4">
                    <input required type="text" value="{{ $user->email }}" class="form-control" name="email"
                        placeholder="Nombre" aria-label="Nombre" aria-describedby="basic-addon1" />
                    <label>Email:</label>
                </div>
                <div class="form-floating col-lg-4">
                    <input required type="password" class="form-control" name="password" placeholder="password"
                        aria-label="password" aria-describedby="basic-addon1" />
                    <label>Password:</label>
                </div>
                <div class="form-floating col-lg-4">
                    <input required type="password" class="form-control" name="password" placeholder="Repetir password"
                        aria-label="password" aria-describedby="basic-addon1" />
                    <label>Repetir Password:</label>
                </div>
            </div>
        </div>
        <div class="card-footer d-flex justify-content-end py-6">
            <button type="submit" class="btn btn-bg-primary btn-text-white">Modificar</button>
        </div>
    </form>
@endsection
