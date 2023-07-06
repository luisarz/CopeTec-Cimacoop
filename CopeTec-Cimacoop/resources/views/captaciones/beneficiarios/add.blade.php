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
    <form action="/beneficiarios/add" id="beneficiariosForm" method="post" autocomplete="off" class="form">
        {!! csrf_field() !!}
        <div class="input-group mb-5"></div>
        <div class="card-body">
            <input type="hidden" name="id_asociado" value="{{ $id_asociado }}">



            <div class="card shadow-lg mx-auto">

                <div class="card shadow-lg">
                    <div class="card-header ribbon ribbon-end ribbon-clip">
                        <div class="card-toolbar">
                            <a href="/movimientos" cla>

                                <button type="button"
                                    class="btn btn-outline btn-outline-dashed btn-outline-danger btn-active-light-danger">
                                    <i class="ki-duotone ki-black-left-line  text-dark   fs-2x">
                                        <i class="path1"></i>
                                        <i class="path2"></i>
                                    </i>
                                </button>
                            </a>

                        </div>
                        <div class="ribbon-label fs-3">
                            Registrar Beneficiario
                            <span class="ribbon-inner bg-info"></span>
                        </div>
                    </div>

                    <div class="card-body">
                        <!--begin::row group-->
                        <div class="form-group row mb-5">
                            <div class="form-floating col-lg-8">
                                <select name="id_cuenta" id="id_cuenta" required class="form-select "
                                    data-control="select2">
                                    <option value="">Seleccione al Cuenta a Asignar</option>
                                    @foreach ($cuentas as $cuenta)
                                        <option value="{{ $cuenta->id_cuenta }}">
                                            {{ $cuenta->numero_cuenta }}-->{{ $cuenta->descripcion_cuenta }}

                                        </option>
                                    @endforeach
                                </select>
                                <label for="floatingPassword">Cuenta Origen</label>
                            </div>
                            <div class="form-floating col-lg-4 mb-5">
                                <select name="parentesco" required  required class="form-select "
                                    data-control="select2">
                                    @foreach ($parentescos as $parentesco)
                                        <option value="{{ $parentesco->id_parentesco }}">
                                            {{ $parentesco->parentesco }}

                                        </option>
                                    @endforeach
                                </select>
                                <label for="floatingPassword">Parentesco</label>
                            </div>
                        </div>
                        <!--begin::row group-->
                        <div class="form-group row mb-5">

                            <div class="form-floating col-lg-8">
                                <input type="text" required class="form-control" placeholder="Nombre" name="nombre" />
                                <label class="floatingPassword">Nombre Beneficiario:</label>
                            </div>
                             <div class="form-floating col-lg-4">
                                <input type="number" atep="any"  required class="form-control"
                                    placeholder="porcentaje %" name="porcentaje" />
                                <label class="floatingPassword">porcenta:</label>
                            </div>
                        </div>
                        <!--begin::row group-->
                        <div class="form-group row mb-5">
                           
                            <div class="form-floating col-lg-8">
                                <input type="text" step="1" required class="form-control" placeholder="Direccion"
                                name="direccion" />
                                <label class="floatingPassword">Direccion del Beneficiario:</label>
                            </div>
                            <div class="form-floating col-lg-4">
                                <input type="text" step="1" required class="form-control" placeholder="telefono"
                                name="telefono" />
                                <label class="floatingPassword">Telefono:</label>
                            </div>
                        </div>



                    </div>
                    <div class="card-footer d-flex justify-content-center py-6">
                        <button type="submit" class="btn btn-bg-info btn-text-white">
                            <i class="fa fa-user text-white fa-2x"></i>    Registrar Beneficiario
                        </button>
                    </div>
                </div>
            </div>





    </form>
@endsection
