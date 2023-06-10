@extends('base.base')
@section('title')
    Agregar Usuario
@endsection
@section('content')
    <form action="/user/add" method="post" autocomplete="nope">
        {!! csrf_field() !!}
        <div class="input-group mb-5"></div>
        <div class="card-body">
            <!--begin::row group-->
            <div class="form-group row mb-5">
                <div class="form-floating col-lg-8">
                    <select required name="id_empleado_usuario" value="{{ old('id_empleado_usuario') }}"
                        data-control="select2" class="form-select">
                        <option value="">Seleccione</option>
                        @foreach ($empleados as $empleado)
                            <option value="{{ $empleado->id_empleado }}">{{ $empleado->nombre_empleado }} -
                                {{ $empleado->dui }}
                            </option>
                        @endforeach
                    </select>
                    <label>Empleado:</label>
                </div>
                <div class="form-floating col-lg-4">
                    <select required name="id_rol" value="{{ old('id_rol') }}" data-control="select2" class="form-select">
                        <option value="">Seleccione</option>
                        @foreach ($roles as $rol)
                            <option value="{{ $rol->id }}">{{ $rol->name }}
                            </option>
                        @endforeach
                    </select>
                    <label>Rol:</label>
                </div>
            </div>
            <!--begin::row group-->
            <div class="form-group row mb-5">
                <div class="form-floating col-lg-4">
                    <input required value="{{ old('email') }}" type="text" class="form-control" name="email"
                        placeholder="Nombre" aria-label="Nombre" aria-describedby="basic-addon1" />
                    <label>Email:</label>
                </div>
                <div class="form-floating col-lg-4">
                    <input required type="password" class="form-control" name="password" placeholder="password"
                        aria-label="password" aria-describedby="basic-addon1" />
                    <label>Password:</label>
                </div>
                <div class="form-floating col-lg-4">
                    <input required type="password" class="form-control" name="rep_password" placeholder="Repetir password"
                        aria-label="password" aria-describedby="basic-addon1" />
                    <label>Repetir Password:</label>
                </div>
            </div>
            @if ($errors->has('email'))
                <div class="alert alert-danger">
                    {{ $errors->first('email') }}
                </div>
            @endif

        </div>



        <div class="card-footer d-flex justify-content-end py-6">
            <button type="submit" class="btn btn-bg-primary btn-text-white">Agregar</button>
        </div>
    </form>
@endsection
