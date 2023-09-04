@extends('base.base')
@section('title')
    Editar Rol
@endsection
@section('formName')
    <span class="badge badge-info fs-5">Patida ID: &nbsp;<span class="badge badge-danger">{{ $idPartida }}</span></span>
@endsection
@section('content')
        <input type="hidden" name="id_partida" id="id_partida" value="{{ $idPartida }}">
        <input type="hidden" id="token" value="{{ csrf_token() }}">

    <form action="/contabilidad/partidas/add" method="post" autocomplete="off">
        {!! csrf_field() !!}
        {{ method_field('POST') }}
        

        <div class="card card-bordered shadow-lg mt-5">
            <div class="card-header ribbon ribbon-end ribbon-clip">
                <div class="card-toolbar">
                    <a href="/contabilidad/partidas">

                        <button type="button"
                            class="btn btn-outline btn-outline-dashed btn-outline-danger btn-active-light-danger">
                            <i class="ki-outline ki-black-left-line  text-dark   fs-1x">
                            </i>
                        </button>
                    </a>

                </div>
                <div class="ribbon-label fs-3">
                    <i class="ki-outline ki-abstract-26 text-white fs-2x"></i>
                    &nbsp; Nueva - Partida Contable
                    <span class="ribbon-inner bg-info"></span>
                </div>
            </div>
            <div class="card-body">



                <!--begin::row group-->
                <div class="form-group row mb-5">
                    <div class="form-floating col-lg-2">
                        <input type="text" name="num_partida" id="num_partida" class="form-control form-control-solid-bg"
                            required placeholder="Des" disabled>
                        <label>Nùmero de Partida:</label>
                    </div>

                    <div class="form-floating col-lg-2">
                        <input type="date" name="fecha_partida" id="fecha_partida" class="form-control form-control-solid-bg"
                            required placeholder="Codigo" value="{{ date('Y-m-d') }}">
                        <label>Fecha de Partida:</label>
                    </div>
                    <div class="form-floating col-lg-2">
                        <select class="form-select form-select-solid" name="tipo_partida" id="tipo_partida"
                            data-control="select2">
                            @foreach ($tipoPartida as $tipo)
                                <option value="{{ $tipo->id_tipo_partida }}">{{ $tipo->descripcion }}</option>
                            @endforeach
                        </select>
                        <label>Tipo de Partida:</label>
                    </div>
                    <div class="form-floating col-lg-6">
                        <input type="text" name="concepto" id="concepto" class="form-control form-control-solid-bg"
                            required placeholder="concepto">
                        <label>Concepto</label>
                    </div>



                </div>
                <!--begin::row group-->
                <div class="form-group col mb-5">



                    <div class="card card-dashed shadow-sm">

                        <div class="card-body ">
                            <h3>Detalles de Partida Contable</h3>
                            <hr>
                            <div class="form-group row mb-1 alert alert-info d-flex align-items-center p-5">

                                <div class="form-floating col-lg-4">
                                    <select class="form-select fs-6" name="id_cuenta" id="id_cuenta" data-control="select2">
                                        <option value="">Seleccione una cuenta</option>
                                        @foreach ($catalogo as $cuenta)
                                            @if ($cuenta->movimiento == 0)
                                                <optgroup label="{{ $cuenta->descripcion }}">
                                            @endif
                                            <option value="{{ $cuenta->id_cuenta }}">
                                                {{ $cuenta->numero }} »
                                                {{ $cuenta->descripcion }}
                                            </option>
                                            @if ($cuenta->movimiento == 0)
                                                </optgroup>
                                            @endif
                                        @endforeach
                                    </select>
                                    <label>CATALOGO</label>
                                </div>
                                <div class="form-floating col-lg-2" style="display: none;">
                                    <input type="number" id="parcial" name="parcial"
                                        class="form-control form-control-solid-bg  fw-bold fs-3 text-info"
                                        placeholder="Movimiento 1" />
                                    <label>PARCIAL:</label>
                                </div>
                                <div class="form-floating col-lg-2">
                                    <input type="number" id="cargos" name="cargos"
                                        class="form-control fw-bold fs-3 text-info" placeholder="Movimiento 1" />
                                    <label>CARGO:</label>
                                </div>
                                <div class="form-floating col-lg-2">
                                    <input type="number" id="abonos" name="abonos"
                                        class="form-control fw-bold fs-3 text-info" placeholder="Movimiento 2" />
                                    <label>ABONO:</label>
                                </div>
                                <div class="form-floating col-lg-2">
                                    <button class="btn btn-danger btn w-100 fw-bold" id="btnDetallePartidaAdd"
                                        name="btnDetallePartidaAdd">
                                        <i class="ki-outline ki-brifecase-tick text-white fs-2x"></i>
                                        Agregar
                                    </button>
                                </div>

                            </div>

                            <div class="table-responsive">
                                <hr>
                                <table class="table table-hover table-rounded table-striped border gy-1 fs-2 ">

                                    <thead>
                                        <tr class="fw-semibold fs-6 text-gray-800 border-bottom-2 border-gray-200">
                                            <th class="min-w-30px">Acciones</th>
                                            <th class="min-w-50px">Cuenta Contable</th>
                                            <th class="min-w-150px">Concepto</th>
                                            <th clcass="min-w-140px" style="text-align: right">PARCIAL</th>
                                            <th class="min-w-140px" style="text-align: right">CARGO</th>
                                            <th class="min-w-140px" style="text-align: right">ABONO</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tablePartidaDetalles">
                                        <tr>
                                            <td colspan="6">
                                                <center>
                                                    <span class="badge badge-light-info fs-2"> NO hay datos para
                                                        mostrar</span>
                                            </td>

                                        </tr>
                                    </tbody>
                                    <tfoot class="">
                                        <tr>
                                            <td colspan="3" style="text-align: right">
                                                <span class="badge badge-info">Totales</span>
                                            </td>
                                            <td style="text-align: right;">
                                                <span id="montoDebe" class="fw-bold">0.00</span>
                                            </td>
                                            <td style="text-align: right;">
                                                <span id="montoHaber" class="fw-bold">0.00</span>

                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="card-footer d-flex justify-content-center py-6">
                <div class="form-floating col-lg-4">

                    <a href="/contabilidad/partidas">

                        <button type="button"
                            class="btn btn-outline btn-outline-dashed btn-outline-danger btn-active-light-danger">
                            <i class="ki-duotone ki-black-left-line  text-dark   fs-2x">
                                <i class="path1"></i>
                                <i class="path2"></i>
                            </i>
                            Cancelar
                        </button>
                    </a>
                    <button type="submit" id="btnProcesarPartida" class="btn btn-bg-info btn-text-white">
                        <i class="fa-solid fa-save fs-2 text-white"></i>
                        Generar Partida Contable
                    </button>
                </div>
            </div>
        </div>

    </form>
@endsection
<link href=" {{ asset('assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
<script src="{{ asset('assets/plugins/global/plugins.bundle.js') }}"></script>
<script src="{{ asset('assets/js/app/partidas/partidas.add.js') }}"></script>

@section('scripts')
    <script>
        $(document).ready(function() {
        });
    </script>
@endsection
