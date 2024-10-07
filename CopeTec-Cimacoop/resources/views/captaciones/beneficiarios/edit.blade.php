@extends('base.base')
@section('formName')
    <i class="ki-outline ki-lovely text-danger fs-1">
    </i>
    @php
        $disponible = 100 - ($totalAsignado - $beneficiario->porcentaje);
    @endphp

    <span class="badge badge-danger"> {{ $totalAsignado - $beneficiario->porcentaje }}% Asignado</span>
    <i class="ki-outline ki-lovely text-success fs-1">
    </i>
    <span class="badge badge-success"> {{ $disponible }}% Disponible</span>
@endsection
@section('content')
    <form action="/captaciones/beneficiarios/put"  method="post" autocomplete="off" class="form">
        {!! csrf_field() !!}
        {{ method_field('PUT') }}

        <div class="input-group mb-5"></div>
        <div class="card-body">
            <input type="hidden" name="id_beneficiario" value="{{ $beneficiario->id_beneficiario }}">
            <input type="hidden" name="id_deposito" value="{{ $beneficiario->id_deposito }}">




            <div class="card shadow-lg mx-auto">

                <div class="card shadow-lg">
                    <div class="card-header ribbon ribbon-end ribbon-clip">
                        <div class="card-toolbar">
                            <a href="/captaciones/depositosplazo/{{ $beneficiario->id_deposito }}/beneficiarios">

                                <button type="button"
                                    class="btn btn-outline btn-outline-dashed btn-outline-danger btn-active-light-danger">
                                    <i class="ki-duotone ki-black-left-line  text-dark   fs-2x">
                                        <i class="path1"></i>
                                        <i class="path2"></i>
                                    </i>
                                </button>
                            </a>

                        </div>
                        <div class="ribbon-label fs-2">
                            <i class="ki-outline ki-user-tick text-white fs-3x"></i>
                            Modificar Beneficiario Deposito a Plazo Fijo # {{ $beneficiario->id_deposito }}
                            <span class="ribbon-inner bg-info"></span>
                        </div>
                    </div>

                    <div class="card-body">
                        <!--begin::row group-->
                        <div class="form-group row mb-5">
                            <div class="form-floating col-lg-6">
                                <input type="text" required class="form-control"
                                    value="{{ $beneficiario->nombre_beneficiario }}" placeholder="Nombre del Beneficiario"
                                    name="nombre_beneficiario" />
                                <label class="floatingPassword">Nombre Beneficiario:</label>
                            </div>
                            <div class="form-floating col-lg-3">
                                <input type="text" required class="form-control" value="{{ $beneficiario->edad }}"
                                    placeholder="Edad del Beneficiario" name="edad" />
                                <label class="floatingPassword">Edad:</label>
                            </div>

                            <div class="form-floating col-lg-3 mb-5">
                                <select name="parentesco" required required class="form-select " data-control="select2">
                                    <option value="">Seleccione el parentesco</option>
                                    @foreach ($parentescos as $parentesco)
                                        @if ($beneficiario->parentesco == $parentesco->id_parentesco)
                                            <option value="{{ $parentesco->id_parentesco }}" selected>
                                                {{ $parentesco->parentesco }}

                                            </option>
                                        @else
                                            <option value="{{ $parentesco->id_parentesco }}">
                                                {{ $parentesco->parentesco }}

                                            </option>
                                        @endif
                                    @endforeach
                                </select>
                                <label for="floatingPassword">Parentesco</label>
                            </div>
                        </div>
                        <!--begin::row group-->
                        <div class="form-group row mb-5">


                            <div class="form-floating col-lg-4">
                                <input type="number" step="any" max="{{ $disponible }}"
                                    value="{{ $beneficiario->porcentaje }}" class="form-control" placeholder="porcentaje %"
                                    name="porcentaje" />
                                <label class="floatingPassword">porcenta:</label>
                            </div>

                            <div class="form-floating col-lg-8">
                                <input type="text" required class="form-control" value="{{ $beneficiario->direccion }}"
                                    placeholder="Direccion" name="direccion" />
                                <label class="floatingPassword">Direccion del Beneficiario:</label>
                            </div>
                        </div>
                        <!--begin::row group-->
                        <div class="form-group row mb-5">
                            <div class="form-floating col-lg-4">
                                <input type="text" required class="form-control" value="{{ $beneficiario->telefono }}"
                                    placeholder="telefono" name="telefono" />
                                <label class="floatingPassword">Telefono:</label>
                            </div>
                        </div>

                    </div>
                    <div class="card-footer d-flex justify-content-center py-6">
                        <button type="submit" class="btn btn-bg-info btn-text-white">
                            <i class="fa fa-user text-white fa-2x"></i> Modificar Beneficiario
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
