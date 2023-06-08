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
                <div class="col-lg-12">
                    <label>Empleado:</label>
                    <select required name="id_empleado" class="form-control select2">
                        <option value="">Seleccione</option>
                        @foreach ($empleados as $empleado)
                            <option value="{{ $empleado->id_empleado }}">{{ $empleado->nombre_empleado }} -
                                {{ $empleado->dui }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <!--begin::row group-->
            <div class="form-group row mb-5">
                <div class="col-lg-4">
                    <label>Email:</label>
                    <input required type="text" class="form-control" name="email" placeholder="Nombre"
                        aria-label="Nombre" aria-describedby="basic-addon1" />
                </div>
                <div class="col-lg-4">
                    <label>Password:</label>
                    <input required type="password" class="form-control" name="password" placeholder="password"
                        aria-label="password" aria-describedby="basic-addon1" />
                </div>
                <div class="col-lg-4">
                    <label>Repetir Password:</label>
                    <input required type="password" class="form-control" name="rep_password" placeholder="Repetir password"
                        aria-label="password" aria-describedby="basic-addon1" />
                </div>
            </div>
        </div>


   
        <div class="card-footer d-flex justify-content-end py-6">
            <button type="submit" class="btn btn-bg-primary btn-text-white">Agregar</button>
        </div>
    </form>
@endsection
