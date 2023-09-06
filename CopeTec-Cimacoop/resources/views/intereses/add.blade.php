@extends('base.base')
@section('formName')
    <i class="ki-duotone ki-user-tick text-success fs-1"><span class="path1"></span><span class="path2"></span><span
            class="path3"></span></i>
    Registro nueva Tasa de interes mensual {{ $id_tipo_cuenta }}
@endsection
@section('content')
    <div class="card shadow-lg py-5">
        <div class="card-body">
            <form action="/intereses/add" method="post" autocomplete="nope" class="form">
                {!! csrf_field() !!}
                <div class="input-group mb-5"></div>
                <div class="card-body">
                    <input type="hidden" name="id_tipo_cuenta" value="{{ $id_tipo_cuenta }}">
                    <!--begin::row group-->
                    <div class="form-group row mb-4">
                        <div class="col-lg-12">
                            <label>Tasa de interes a Asignar:</label>

                            <input type="number" max="100" name="interes" placeholder="tasa de interes"
                                class="form-control required">
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <button type="submit" class="btn btn-bg-primary btn-text-white">Agregar</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
@endsection
