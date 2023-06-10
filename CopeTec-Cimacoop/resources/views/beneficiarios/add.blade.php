@extends('base.base')
@section('formName')
    <i class="ki-duotone ki-profile-user text-success fs-1"><span class="path1"></span><span class="path2"></span><span
            class="path3"></span></i>
    Registro nuevo Beneficiario
    <i class="ki-duotone ki-dollar text-danger fs-1">
        <span class="path1"></span>
        <span class="path2"></span>
        <span class="path3"></span></i>
    {{ $totalAsignado }}% Asignado
@endsection
@section('content')
    @php
        $disponible = 100 - $totalAsignado;
    @endphp
    <form action="/beneficiarios/add" id="beneficiariosForm" method="post" autocomplete="nope" class="form">
        {!! csrf_field() !!}
        <div class="input-group mb-5"></div>
        <div class="card-body">
            <input type="hidden" name="id_asociado" value="{{ $id_asociado }}">



            <!--begin::row group-->
            <div class="form-group row mb-5">
                <div class="col-lg-8">
                    <label>Nombre Beneficiario:</label>
                    <input type="text" required class="form-control" placeholder="Nombre" name="nombre" />
                </div>
                <div class="col-lg-4">
                    <label>Parentesco:</label>
                    <input type="text" required class="form-control" placeholder="Parentesco" name="parentesco" />
                </div>
            </div>

            <!--begin::row group-->
            <div class="form-group row mb-5">
                <div class="col-lg-4">
                    <label>porcenta:</label>
                    <input type="number" atep="any" max="{{ $disponible }}" required class="form-control"
                        placeholder="porcentaje %" name="porcentaje" />
                </div>
                <div class="col-lg-8">
                    <label>Dependientes economicamente de cliente:</label>
                    <input type="text" step="1" required class="form-control" placeholder="Direccion"
                        name="direccion" />
                </div>
            </div>



        </div>



        <div class="card-footer d-flex justify-content-end py-6">
            <button type="submit" class="btn btn-bg-primary btn-text-white">Agregar</button>
        </div>
    </form>
@endsection
