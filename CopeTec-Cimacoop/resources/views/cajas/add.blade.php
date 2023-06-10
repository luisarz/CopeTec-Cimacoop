@extends('base.base')
@section('title')
    Agregar Usuario
@endsection
@section('content')
    <form action="/cajas/add" method="post" autocomplete="nope">
        {!! csrf_field() !!}
        <div class="input-group mb-5"></div>
        <div class="card-body">
            <!--begin::row group-->
            <div class="form-group row mb-4">
                <div class="form-floating col-lg-4">
                    <input required value="{{ old('numero_caja') }}" type="text" class="form-control" name="numero_caja"
                        placeholder="numero_caja" aria-label="numero_caja" aria-describedby="basic-addon1" />
                    <label>Numero Caja:</label>
                </div>
                <div class="form-floating col-lg-6">
                    <select required name="id_usuario_asignado"  data-control="select2" class="form-select">
                        <option value="">Seleccione</option>
                        @foreach ($users as $user)
                            @if ($user->id == old('id_usuario_asignado'))
                                <option selected value="{{ $user->id_empleado }}">{{ $user->nombre_empleado }} -
                                    {{ $user->dui }}
                                </option>
                            @else
                                <option value="{{ $user->id_empleado_usuario }}">{{ $user->nombre_empleado }}-
                                    {{ $user->dui }} </option>
                            @endif
                        @endforeach
                    </select>
                    <label>Cajero:</label>
                </div>
            
                
                <div class="form-floating col-lg-2">
                    <button type="submit" class="btn btn-bg-primary btn-text-white">Agregar Caja</button>
                </div>
               
            </div>
            <!--begin::row group-->

            @if ($errors->has('numero_caja'))
                <div class="alert alert-danger">
                    {{ $errors->first('numero_caja') }}
                </div>
            @endif

        </div>




    </form>
@endsection
