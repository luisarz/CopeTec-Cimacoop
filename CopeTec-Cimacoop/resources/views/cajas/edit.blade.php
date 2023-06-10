@extends('base.base')
@section('title')
    Modificar Caja
@endsection
@section('content')
    <form action="/cajas/put" method="post" autocomplete="nope">
        {!! csrf_field() !!}
        {{ method_field('PUT') }}
        <input type="hidden" name="id" value="{{ $caja->id_caja }}">
        <div class="card-body">
            <!--begin::row group-->
            <div class="form-group row mb-4">
                <div class="form-floating col-lg-4">
                    <input  required value="{{ $caja->numero_caja }}" type="text" class="form-control fs-5" name="numero_caja"
                        placeholder="numero_caja" aria-label="numero_caja" aria-describedby="basic-addon1" />
                    <label>Numero Caja:</label>
                </div>
                <div class="form-floating col-lg-6">
                    <select required name="id_usuario_asignado" data-control="select2" class="form-select">
                        <option value="">Seleccione</option>
                        @foreach ($usuarios as $user)
                            @if ($caja->id_usuario_asignado == $user->empleadoId)
                                <option selected value="{{ $user->userId }}">{{ $user->nombre_empleado }} -
                                    {{ $user->dui }}
                                </option>
                            @else
                                <option value="{{ $user->userId }}">{{ $user->nombre_empleado }}-
                                    {{ $user->dui }} </option>
                            @endif
                        @endforeach
                    </select>
                    <label>Cajero:</label>
                </div>
            </div>
            <div class="card-footer d-flex justify-content-end py-6">
                <button type="submit" class="btn btn-bg-primary btn-text-white">Modificar</button>
            </div>
    </form>
@endsection
