@extends('base.base')
@section('title')
    Editar Rol
@endsection
@section('content')
    <form action="/contabilidad/catalogo/put" method="post" autocomplete="off">
        {!! csrf_field() !!}
        {{ method_field('PUT') }}

        <input type="hidden" name="id" value="{{ $cuenta->id_cuenta }}">
        <input type="hidden" id="id_cuenta_padre_actual" value="{{ $cuenta->id_cuenta_padre }}">

        <div class="card card-bordered shadow-lg mt-5">
            <div class="card-header ribbon ribbon-end ribbon-clip">
                <div class="card-toolbar">
                    <a href="/contabilidad/catalogo">

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
                    <i class="ki-duotone ki-calendar text-white fs-3x"><span class="path1"></span><span
                            class="path2"></span><span class="path3"></span></i> &nbsp;
                    Modificar - Cuenta Contable
                    <span class="ribbon-inner bg-info"></span>
                </div>
            </div>
            <div class="card-body">



                <!--begin::row group-->
                <div class="form-group row mb-5">
                    <div class="form-floating col-lg-2 mb-3">
                        <select class="form-select form-select-solid" name="tipo_catalogo" id="tipo_catalogo"
                            data-control="select2">
                            @foreach ($tipoCatalogo as $tipo)
                                @if ($tipo->id_tipo_catalogo == $cuenta->tipo_catalogo)
                                    <option value="{{ $tipo->id_tipo_catalogo }}" selected>
                                        {{ $tipo->descripcion }}</option>
                                @else
                                    <option value="{{ $tipo->id_tipo_catalogo }}">{{ $tipo->descripcion }}</option>
                                @endif
                            @endforeach
                        </select>
                        <label>TIPO CUENTA:</label>
                    </div>
                    <div class="form-floating col-lg-4 mb-3">
                        <select class="form-select form-select-solid" name="id_cuenta_padre" id="id_cuenta_padre"
                            data-control="select2">

                        </select>
                        <label>CUENTA PADRE:</label>
                    </div>
                    <div class="form-floating col-lg-3 mb-3">
                        <input type="text" name="numero" id="numero" value="{{ $cuenta->numero }}"
                            class="form-control" required>
                        <label>CODIGO CUENTA:</label>
                    </div>
                    <div class="form-floating col-lg-3 mb-3">
                        <input type="text" name="descripcion" id="descripcion" value="{{ $cuenta->descripcion }}"
                            class="form-control" required>
                        <label>NOMBRE CUENTA:</label>
                    </div>


                </div>
                <!--begin::row group-->
                <div class="form-group row mb-5">
                    <div class="form-floating col-lg-4 mb-3">
                        <input type="number" name="saldo" id="saldo" value="{{ $cuenta->saldo }}"
                            class="form-control" required>
                        <label>SALDO CUENTA:</label>
                    </div>
                    <div class="form-floating col-lg-2 mb-3">

                        <select class="form-select form-select-solid" name="iva" id="iva" data-control="">

                            @if ($cuenta->iva == 1)
                                <option value="1" selected>Aplica IVA</option>
                                <option value="0">Sin IVA</option>
                            @else
                                <option value="1">Aplica IVA</option>
                                <option value="0" selected>Sin IVA</option>
                            @endif
                        </select>
                        <label>IVA:</label>
                    </div>

                    <div class="form-floating col-lg-2 mb-3">
                        <select class="form-select form-select-solid" name="movimiento" id="movimiento" data-control="">
                            @if ($cuenta->movimiento == 1)
                                <option value="1" selected>SI</option>
                                <option value="0">NO</option>
                            @else
                                <option value="1">SI</option>
                                <option value="0" selected>NO</option>
                            @endif
                        </select>
                        <label>MOVIMIENTO:</label>
                    </div>
                    <div class="form-floating col-lg-4 mb-3">
                        <select class="form-select form-select-solid" name="estado" id="estado">
                            @if ($cuenta->estado == 1)
                                <option value="1" selected>Activo</option>
                                <option value="0">Inactivo</option>
                            @else
                                <option value="1">Activo</option>
                                <option value="0" selected>Inactivo</option>
                            @endif
                        </select>
                        <label>ESTADO:</label>
                    </div>
                </div>
                <!--begin::row group-->
                <div class="form-group row mb-5">
                    <div class="form-floating col-lg-4 mb-3">
                        <select class="form-select form-select-solid" name="tipo_reporte" id="tipo_reporte" data-control=""
                            required>
                            <option value="">Seleccione el tipo de reporte</option>
                            @if ($cuenta->tipo_reporte == 'B')
                                <option value="B" selected>Balance de Situación</option>
                                <option value="E">Estado de Resultado</option>
                                <option value="O">Cuenta de Orden</option>
                            @elseif($cuenta->tipo_reporte == 'E')
                                <option value="B">Balance de Situación</option>
                                <option value="E" selected>Estado de Resultado</option>
                                <option value="O">Cuenta de Orden</option>
                            @else
                                <option value="B">Balance de Situación</option>
                                <option value="E">Estado de Resultado</option>
                                <option value="O" selected>Cuenta de Orden</option>
                            @endif
                        </select>
                        <label>TIPO REPORTE:</label>
                    </div>
                    <div class="form-floating col-lg-2 mb-3">

                        <select class="form-select form-select-solid" name="tipo_saldo_normal" id="tipo_saldo_normal"
                            data-control="">

                            @if ($cuenta->tipo_saldo_normal == 'D')
                                <option value="D" selected>Deudor</option>
                                <option value="A">Acreedor</option>
                            @else
                                <option value="D">Deudor</option>
                                <option value="A" selected>Acreedor</option>
                            @endif
                        </select>
                        <label>TIPO SALDO NORMAL:</label>
                    </div>

                    <div class="form-floating col-lg-2">
                        <input type="text" name="codigo_agrupador" id="codigo_agrupador" disabled
                            value="{{ $cuenta->codigo_agrupador }}" class="form-control" required>
                        <label>CODIGO AGRUPADOR:</label>
                    </div>
                </div>
            </div>

        </div>
        <div class="card-footer d-flex justify-content-center py-6">
            <div class="form-floating col-lg-4">

                <a href="/contabilidad/catalogo">

                    <button type="button"
                        class="btn btn-outline btn-outline-dashed btn-outline-danger btn-active-light-danger">
                        <i class="ki-duotone ki-black-left-line  text-dark   fs-2x">
                            <i class="path1"></i>
                            <i class="path2"></i>
                        </i>
                        Cancelar
                    </button>
                </a>
                <button type="submit" class="btn btn-bg-info btn-text-white">
                    <i class="fa-solid fa-save fs-2 text-white"></i>
                    Modificar Cuenta
                </button>
            </div>
        </div>
        </div>

    </form>
@endsection
@section('scripts')
    <link href=" {{ asset('assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    <script src="{{ asset('assets/plugins/global/plugins.bundle.js') }}"></script>
    <script src="{{ asset('assets/js/app/partidas/catalogo.js') }}"></script>
    <script></script>
@endsection
