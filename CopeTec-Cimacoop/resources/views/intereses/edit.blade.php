@extends('base.base')
@section('formName')
    <i class="ki-duotone ki-user-tick text-success fs-1"><span class="path1"></span><span class="path2"></span><span
            class="path3"></span></i>
    Mdificar Asociado {{ $interes->interes }}
@endsection
@section('content')
    <form action="/intereses/put" method="post" autocomplete="nope">
        {!! csrf_field() !!}
        {{ method_field('PUT') }}
        <input type="hidden" name="id" value="{{ $interes->id_intereses_tipo_cuenta }}">
        <div class="input-group mb-5"></div>

        <div class="card-body">

            <!--begin::row group-->
            <div class="form-group row mb-4">
                <div class="col-lg-12">
                    <label>Tasa de interes a Asignar:</label>
                   <input type="number" max="100" required name="interes" value="{{ $interes->interes }}"
       placeholder="tasa de interes" class="form-control required">

                </div>
            </div>
        </div>
        <div class="card-footer d-flex justify-content-end py-6">
            <button type="submit" class="btn btn-bg-primary btn-text-white">Modificar</button>
        </div>
    </form>
@endsection
